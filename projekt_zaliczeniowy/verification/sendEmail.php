<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once("../pathHelper.php");
class sendEmail
{
    function send($code, $mailTo, $firstName, $lastName)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.wp.pl';
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply.kursikipl@wp.pl';
            $mail->Password = 'zaq1@WSX123';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->isHTML(true);
            $mail->setFrom('no-reply.kursikipl@wp.pl', "Kursiki-pl");
            $mail->addAddress($mailTo, "$firstName $lastName");
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Weryfikacja adresu e-mail';
            // $mail->Body= "Witaj ". $firstName.", Wciśnij ten przycisk, aby potwierdzić rejestrację: <a href=\"http://francis.ct8.pl/michal/verification/verifyEmail.php?code=$code\">Weryfikuj</a>";
            $mail->Body= "Witaj ". $firstName.", Wciśnij ten przycisk, aby potwierdzić rejestrację: <a href=\"http://localhost/projekt_zaliczeniowy/verification/verifyEmail.php?code=$code\">Weryfikuj</a>";
            $mail->send();

            echo 'Wiadomość została wysłana!';
        } catch (Exception $e) {

            echo 'Wiadomość nie została wysłana, z powodu tego błędu ->', $mail->ErrorInfo;
        }
    }
}


