<?php
namespace Classes;
// use pdo_connection4;
require_once "connection/pdo_connection4.php";
require_once "file_upload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";

// use Classes\FileUpload;
class Person
{
    public int $personID;
    public string $lastname;
    public string $firstname;
    public string $middlename;
    public string $suffix;
    public int $mobile;
    public string $dob;
    public string $email;
    public string $gender;
    public string $marital_status;
    public string $father_lastName;
    public string $father_firstName;
    public string $father_middleName;
    public string $father_suffix;
    public string $religion;
    public string $lang_known;
    public string $hobbiesName;
    public $pfp;
    public string $street;
    public string $barangay;
    public string $city;
    public string $province;
    public string $skills;
    private $con;
    private string $response;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function getPostPerson()
    {
        if (!empty($_POST)) {
            $this->lastname = $_POST["lastname"];
            $this->firstname = $_POST["firstname"];
            $this->middlename = $_POST["middlename"];
            $this->suffix = $_POST["suffix"];
            $this->dob = $_POST["dob"];
            $this->gender = $_POST["gender"];
            $this->email = $_POST["email"];
            $this->mobile = $_POST["mobile"];
            $this->street = $_POST["street"];
            $this->barangay = $_POST["barangay"];
            $this->city = $_POST["city"];
            $this->province = $_POST["province"];
            $this->religion = $_POST["religion"];
            $this->father_lastName = $_POST["father_lastName"];
            $this->father_firstName = $_POST["father_firstName"];
            $this->father_middleName = $_POST["father_middleName"];
            $this->father_suffix = $_POST["father_suffix"];
            $this->marital_status = $_POST["marital_status"];
            $this->lang_known = $_POST["lang_known"];
            $this->hobbiesName = $_POST["hobbiesName"];
            $this->skills = $_POST["skills"];
        }
    }

    // ============================================================
    // [ADDED] checkDuplicate()
    // PURPOSE: Prevents duplicate submissions by checking if the
    //          given email OR mobile already exists in either the
    //          approved `person` table or the pending `temp_person`
    //          table BEFORE inserting a new record.
    // RETURNS: true  = duplicate found (block the insert)
    //          false = no duplicate (safe to proceed)
    // ============================================================
    private function checkDuplicate(string $email, int $mobile): bool
    {
        // [ADDED] Check approved records in `person` table
        $chkPerson = $this->con->prepare(
            "SELECT personID FROM person
             WHERE email = ? OR mobile = ?
             LIMIT 1",
        );
        $chkPerson->execute([$email, $mobile]);
        if ($chkPerson->rowCount() > 0) {
            return true; // duplicate found in approved records
        }

        // [ADDED] Check pending records in `temp_person` table
        // (catches re-submissions while still awaiting admin approval)
        $chkTemp = $this->con->prepare(
            "SELECT personID FROM temp_person
             WHERE email = ? OR mobile = ?
             LIMIT 1",
        );
        $chkTemp->execute([$email, $mobile]);
        if ($chkTemp->rowCount() > 0) {
            return true; // duplicate found in pending records
        }

        return false; // no duplicate — allow insert
    }

    // ADDING FUNCTION
    public function AddPerson()
    {
        if (isset($_POST["AddPerson"])) {
            $uploads = new FileUpload($_FILES["pfp"], "../profiles/");
            $pfp = $uploads->fileName;
            if ($uploads->upload()) {
                $this->getPostPerson();

                // ============================================================
                // [ADDED] Duplicate guard — runs BEFORE the INSERT.
                // If the submitted email or mobile already exists in either
                // `person` (approved) or `temp_person` (pending), we stop
                // here and alert the user instead of writing a duplicate row.
                // ============================================================
                if ($this->checkDuplicate($this->email, $this->mobile)) {
                    echo "<script>
                        alert('Submission failed: A record with this email address or mobile number already exists.\\n\\nIf you believe this is an error, please contact the administrator.');
                        window.history.back();
                    </script>";
                    exit(); // [ADDED] Hard stop — do not proceed to INSERT or send email
                }

                $stmt = $this->con->prepare(
                    "INSERT INTO temp_person(lastname,firstname,middlename,suffix,dob,gender,email,mobile,street,barangay,city,province,religion,father_lastName,father_firstName,father_middleName,father_suffix,marital_status,lang_known,hobbiesName,skills,pfp)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                );
                $stmt->execute([
                    $this->lastname,
                    $this->firstname,
                    $this->middlename,
                    $this->suffix,
                    $this->dob,
                    $this->gender,
                    $this->email,
                    $this->mobile,
                    $this->street,
                    $this->barangay,
                    $this->city,
                    $this->province,
                    $this->religion,
                    $this->father_lastName,
                    $this->father_firstName,
                    $this->father_middleName,
                    $this->father_suffix,
                    $this->marital_status,
                    $this->lang_known,
                    $this->hobbiesName,
                    $this->skills,
                    $pfp,
                ]);

                // Prepare and send email
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "ezekielclarence6@gmail.com";
                $mail->Password = "maoe hdsr mcwx tpcy";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom("ezekielclarence6@gmail.com", "PHP Mailer");
                $mail->addAddress($this->email);
                $mail->isHTML(true);

                $mail->Subject = "Registration Confirmation";

                $mail->Body = "<pre>Dear 
                    'Warm Greetings!
                       
                        We are pleased to confirm receipt of your payment for the 17th PhilSPEN Annual Convention, themed NUTRITION MEDICINE: Integrated Approach to Patient Care, to be held on November 20-21, 2025, at Novotel Manila, Araneta City.

                        Attached to this email is your unique QR code, which will serve as your entry pass to claim your convention ID and kit. It will also be used for attendance tracking throughout the event.

                        Important Reminders:
                        <li>Save your QR Code on your mobile device for easy access at the <b>Registration Table</b></li>
                        <li>Ensure the QR code is clearly visible for scanning</li>
                        <li>If you're unable to present the QR code digitally, bring a printed copy as backup.</li>
                        <li>Have your valid ID ready for verification of registration details.</li>

                        Should you have any concerns, feel free to reach out to us at 87230101 loc 5706 / 09338534625 or email us at philspen.sec20@gmail.com.

                        We look forward to seeing you at the convention!

                        Best regards,

                        Racquel O. Cainap-Andaya, MD
                        Head, Registration and Membership Committee
                        Philippine Society for Parenteral and Enteral Nutrition
                        </pre>'";

                $mail->send();

                $this->responseSQL($stmt);
                header("Location: ../index.php");
            }
        }
    }

    public function deletePerson($personID)
    {
        $stmt = $this->con->prepare("DELETE FROM person WHERE personID = ?");
        $stmt->execute([$personID]);
        return $stmt->rowCount() > 0;
    }

    // edit function
    public function editPerson($personID)
    {
        $this->getPostPerson();
        if (!empty($_POST)) {
            if ($_FILES["pfp"]["name"]) {
                $uploads = new FileUpload($_FILES["pfp"], "../profiles/");
                $pfp = $uploads->fileName;
                if ($uploads->upload()) {
                    // ============================================================
                    // [ADDED] Duplicate guard for editPerson().
                    // When updating, we check if the NEW email or mobile already
                    // belongs to a DIFFERENT person (exclude current personID).
                    // This prevents someone from changing their contact info to
                    // one that is already registered by another record.
                    // ============================================================
                    $chkEdit = $this->con->prepare(
                        "SELECT personID FROM person
                         WHERE (email = ? OR mobile = ?)
                         AND personID != ?
                         LIMIT 1",
                    );
                    $chkEdit->execute([$this->email, $this->mobile, $personID]);
                    if ($chkEdit->rowCount() > 0) {
                        // [ADDED] Block update and alert — the email/mobile is taken by another record
                        echo "<script>
                            alert('Update failed: The email address or mobile number is already used by another record.');
                            window.history.back();
                        </script>";
                        exit();
                    }

                    $stmt = $this->con->prepare(
                        "UPDATE person SET firstname = ?, lastname = ?, middlename = ?, suffix = ?, mobile = ?, email = ?, dob = ?, gender = ?, marital_status = ?, father_lastName = ?, father_firstName = ?, father_middleName = ?, father_suffix = ?, religion = ?, lang_known = ?, hobbiesName = ?, street = ?, barangay = ?, city = ?, province = ?, skills = ?. pfp = ? WHERE personID = ?;",
                    );
                    $stmt->execute([
                        $this->firstname,
                        $this->lastname,
                        $this->middlename,
                        $this->suffix,
                        $this->mobile,
                        $this->email,
                        $this->dob,
                        $this->gender,
                        $this->marital_status,
                        $this->father_lastName,
                        $this->father_firstName,
                        $this->father_middleName,
                        $this->father_suffix,
                        $this->religion,
                        $this->lang_known,
                        $this->hobbiesName,
                        $this->street,
                        $this->barangay,
                        $this->city,
                        $this->province,
                        $this->skills,
                        $pfp,
                        $personID,
                    ]);
                    $this->responseSQL($stmt);
                    header("Location: ../includes/editPerson.php?id=$personID");
                }
            }
        }
    }

    public function viewPerson($personID)
    {
        if (!$personID) {
            return 0;
        }
        $stmt = $this->con->prepare("SELECT * FROM person WHERE personID = ?");
        $stmt->execute([$personID]);
        return $stmt->rowCount() ? $stmt->fetch() : 0;
    }

    public function getAllPerson()
    {
        $stmt = $this->con->prepare("SELECT * FROM person");
        $stmt->execute();
        if (!$stmt->rowCount()) {
            return [];
        }
        return $stmt->fetchAll();
    }

    public function getAllTemp()
    {
        $stmt = $this->con->prepare("SELECT * FROM temp_person");
        $stmt->execute();
        if (!$stmt->rowCount()) {
            return [];
        }
        return $stmt->fetchAll();
    }

    public function viewTemp($personID)
    {
        if (!$personID) {
            return 0;
        }
        $stmt = $this->con->prepare("SELECT * FROM temp_person WHERE personID = ?");
        $stmt->execute([$personID]);
        return $stmt->rowCount() ? $stmt->fetch() : 0;
    }

    public function deleteTemp($personID)
    {
        $stmt = $this->con->prepare("DELETE FROM temp_person WHERE personID = ?");
        $stmt->execute([$personID]);
        return $stmt->rowCount() > 0;
    }

    public function responseSQL($stmt)
    {
        if ($stmt->rowCount()) {
            $this->response = "success";
        } else {
            $this->response = "failed";
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
$Person = new Person($db);
