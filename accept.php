<?php
require "./connection/pdo_connection4.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer-master/src/Exception.php";
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";

$personID = $_GET["personID"];

if ($personID) {
    try {
        $gettemp = $db->prepare("SELECT lastname, firstname, middlename, suffix,
                    mobile, email,
                    dob, gender, marital_status, father_lastName,
                    father_firstName, father_middleName, father_suffix,
                    religion, lang_known, hobbiesName,
                    street, barangay, city, province, skills, pfp FROM temp_person WHERE personID = ?");
        $gettemp->execute([$personID]);

        if ($gettemp->rowCount()) {
            foreach ($gettemp->fetchAll() as $key => $row) {
                // ============================================================
                // [ADDED] Second-layer duplicate check at admin accept time.
                // Catches race conditions where a record was manually added to
                // `person` after the submission was queued in `temp_person`,
                // or when the same person got two rows into `temp_person` and
                // the first was already accepted.
                // On duplicate: store conflict details in session and redirect
                // to index.php with ?duplicate=1 so the admin sees a modal.
                // ============================================================
                $chkDupe = $db->prepare(
                    "SELECT personID, firstname, lastname, email, mobile
                     FROM person
                     WHERE email = ? OR mobile = ?
                     LIMIT 1",
                );
                $chkDupe->execute([$row["email"], $row["mobile"]]);

                if ($chkDupe->rowCount() > 0) {
                    $match = $chkDupe->fetch(\PDO::FETCH_ASSOC);

                    // [ADDED] Identify which field(s) collided
                    $emailMatch = strtolower($match["email"]) === strtolower($row["email"]);
                    $mobileMatch = (string) $match["mobile"] === (string) $row["mobile"];
                    if ($emailMatch && $mobileMatch) {
                        $field = "email address and mobile number";
                    } elseif ($emailMatch) {
                        $field = "email address";
                    } else {
                        $field = "mobile number";
                    }

                    // [ADDED] Clean up the temp row since it can't be accepted
                    $delTemp = $db->prepare("DELETE FROM temp_person WHERE personID = ?");
                    $delTemp->execute([$personID]);

                    // [ADDED] Store conflict details in session for index.php modal
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION["duplicate_error"] = [
                        "field" => $field,
                        "source" => "approved records",
                        "match" => $match,
                        "context" => "accept", // [ADDED] Flag so admin-side modal shows admin-appropriate message
                    ];

                    header("Location: index.php?duplicate=1");
                    exit();
                }

                $insert = $db->prepare("INSERT INTO person (lastname, firstname, middlename, suffix,
                    mobile, email,
                    dob, gender, marital_status, father_lastName,
                    father_firstName, father_middleName, father_suffix,
                    religion, lang_known, hobbiesName,
                    street, barangay, city, province, skills, pfp) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                !$insert->execute([
                    $row["lastname"],
                    $row["firstname"],
                    $row["middlename"],
                    $row["suffix"],
                    $row["mobile"],
                    $row["email"],
                    $row["dob"],
                    $row["gender"],
                    $row["marital_status"],
                    $row["father_lastName"],
                    $row["father_firstName"],
                    $row["father_middleName"],
                    $row["father_suffix"],
                    $row["religion"],
                    $row["lang_known"],
                    $row["hobbiesName"],
                    $row["street"],
                    $row["barangay"],
                    $row["city"],
                    $row["province"],
                    $row["skills"],
                    $row["pfp"],
                ]);

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "ezekielclarence6@gmail.com";
                $mail->Password = "maoe hdsr mcwx tpcy";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom("ezekielclarence6@gmail.com", "Biodata System");
                $mail->addAddress($row["email"]);
                $mail->isHTML(true);

                $fullName =
                    htmlspecialchars(strtoupper($row["firstname"])) .
                    " " .
                    htmlspecialchars(strtoupper($row["middlename"])) .
                    " " .
                    htmlspecialchars(strtoupper($row["lastname"]));

                $mail->Subject = "Registration Approved: Biodata Submission Successful";
                $mail->Body = '<h3>Registration Approved</h3>
                                <p>Hello,</p>
                                <p>We are pleased to inform you that your <strong>Biodata Registration</strong> has been reviewed and successfully <strong>Approved</strong>.</p>
                                <p>Your information has been securely integrated into our system.</p>
                                <br>
                                <p>Best regards,</p>
                                <p><strong>The Project Team</strong></p>';
                $mail->send();
                echo "<script>alert('Record accepted and email sent successfully.'); window.location.href='index.php';</script>";
            }
        }
    } catch (Exception $e) {
        print_r($e);
        die();
    }

    $stmt = "DELETE FROM temp_person WHERE personID = ?";
    $st = $db->prepare($stmt);
    $st->execute([$personID]);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
