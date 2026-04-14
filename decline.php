<?php
require "./connection/pdo_connection4.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer-master/src/Exception.php";
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";

$personID = $_GET["personID"];

if ($personID != null) {
    $stmt = "SELECT email FROM temp_person WHERE personID = ?";
    $st = $db->prepare($stmt);

    if ($st->execute([$personID])) {
        $row = $st->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $stmt = "DELETE FROM temp_person WHERE personID = ?";
            $st = $db->prepare($stmt);
            $st->execute([$personID]);

            //prepare
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
                htmlspecialchars(strtoupper($row["firstname"])) . " " . htmlspecialchars(strtoupper($row["lastname"]));

            $mail->Subject = "Update Regarding Your Biodata Registration";
            $mail->Body = "<h3>Registration Update</h3>
                    <p>Hello, $fullName </p>
                    <p>Thank you for submitting your biodata for registration. After a careful review of the details provided, we regret to inform you that your registration has been <strong>Declined</strong> at this time.</p>
                    <p><strong>Reason for decision:</strong> The information provided was either incomplete or did not meet the specific requirements for this phase of the project.</p>
                    <p>If you believe this was an error or would like to re-submit with updated information, please feel free to reach out to us or submit a new form.</p>
                    <br>
                    <p>Best regards,</p>
                    <p><strong>The Project Team</strong></p>";
            $mail->send();
            echo "<script>alert('Record accepted and email sent successfully.'); window.location.href='index.php';</script>";
        }
    }
} else {
    header("Location: index.php");
}
?>
