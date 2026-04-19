<?php
namespace Classes;
require_once "connection/pdo_connection4.php";
require_once "file_upload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";

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
    // [ADDED] checkDuplicateDetailed()
    // PURPOSE: Instead of just returning true/false, this returns
    //          a rich array describing WHAT field matched and WHICH
    //          existing record it conflicts with, so the UI can
    //          display a meaningful error to the user.
    //
    // RETURNS: null  = no duplicate (safe to proceed)
    //          array = [
    //            'field'  => which field(s) collided (e.g. "email address")
    //            'source' => where it was found ('approved records' | 'pending approval')
    //            'match'  => the conflicting row [personID, firstname, lastname, email, mobile]
    //          ]
    // ============================================================
    private function checkDuplicateDetailed(string $email, int $mobile): ?array
    {
        // [ADDED] Check both tables: approved first, then pending
        $tables = [
            "person" => "approved records",
            "temp_person" => "pending approval",
        ];

        foreach ($tables as $table => $label) {
            // [ADDED] Fetch the conflicting row so we can show its name/contact in the UI
            $stmt = $this->con->prepare(
                "SELECT personID, firstname, lastname, email, mobile
                 FROM $table
                 WHERE email = ? OR mobile = ?
                 LIMIT 1",
            );
            $stmt->execute([$email, $mobile]);

            if ($stmt->rowCount() > 0) {
                $match = $stmt->fetch(\PDO::FETCH_ASSOC);

                // [ADDED] Identify exactly which field(s) caused the collision
                $emailMatch = strtolower($match["email"]) === strtolower($email);
                $mobileMatch = (string) $match["mobile"] === (string) $mobile;

                if ($emailMatch && $mobileMatch) {
                    $field = "email address and mobile number";
                } elseif ($emailMatch) {
                    $field = "email address";
                } else {
                    $field = "mobile number";
                }

                return [
                    "field" => $field,
                    "source" => $label,
                    "match" => $match,
                ];
            }
        }

        return null; // no duplicate found
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
                // [ADDED] Run detailed duplicate check before INSERT.
                // On duplicate: store result in session, redirect back to the
                // form with ?duplicate=1 so the page renders a modal with the
                // full conflict details (who already has this email/mobile).
                // ============================================================
                $duplicate = $this->checkDuplicateDetailed($this->email, $this->mobile);

                if ($duplicate !== null) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    // [ADDED] Save detailed duplicate info to session for the form page to read
                    $_SESSION["duplicate_error"] = $duplicate;
                    header("Location: ../includes/addPerson.php?duplicate=1");
                    exit();
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
                $mail->Body =
                    "<pre>Dear,\n\nWarm Greetings!\n\nWe have received your biodata submission and it is now pending review.\n\nBest regards,\nThe Project Team</pre>";
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
                    // Excludes current personID so a person's own record doesn't
                    // trigger a false positive. Uses same detailed return format.
                    // ============================================================
                    $chkEdit = $this->con->prepare(
                        "SELECT personID, firstname, lastname, email, mobile
                         FROM person
                         WHERE (email = ? OR mobile = ?)
                         AND personID != ?
                         LIMIT 1",
                    );
                    $chkEdit->execute([$this->email, $this->mobile, $personID]);

                    if ($chkEdit->rowCount() > 0) {
                        $match = $chkEdit->fetch(\PDO::FETCH_ASSOC);
                        $emailMatch = strtolower($match["email"]) === strtolower($this->email);
                        $mobileMatch = (string) $match["mobile"] === (string) $this->mobile;

                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        $_SESSION["duplicate_error"] = [
                            "field" =>
                                $emailMatch && $mobileMatch
                                    ? "email address and mobile number"
                                    : ($emailMatch
                                        ? "email address"
                                        : "mobile number"),
                            "source" => "approved records",
                            "match" => $match,
                        ];
                        header("Location: ../includes/editPerson.php?id=$personID&duplicate=1");
                        exit();
                    }

                    $stmt = $this->con->prepare(
                        "UPDATE person SET firstname = ?, lastname = ?, middlename = ?, suffix = ?, mobile = ?, email = ?, dob = ?, gender = ?, marital_status = ?, father_lastName = ?, father_firstName = ?, father_middleName = ?, father_suffix = ?, religion = ?, lang_known = ?, hobbiesName = ?, street = ?, barangay = ?, city = ?, province = ?, skills = ?, pfp = ? WHERE personID = ?;",
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
        return $stmt->rowCount() ? $stmt->fetchAll() : [];
    }

    public function getAllTemp()
    {
        $stmt = $this->con->prepare("SELECT * FROM temp_person");
        $stmt->execute();
        return $stmt->rowCount() ? $stmt->fetchAll() : [];
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
        $this->response = $stmt->rowCount() ? "success" : "failed";
    }

    public function getResponse()
    {
        return $this->response;
    }
}
$Person = new Person($db);
