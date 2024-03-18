<?php
require_once('mailer/vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class mailControler
{
    function sendMail($sendMailAdress, $sendMailName, $sendMailSubject, $sendMailMessage) {
        global $mailHost;
        global $mailSMTPAuth;
        global $mailUsername;
        global $mailPassword;
        global $mailSMTPSecure;
        global $mailPort;
        global $mailSenderAddress;
        global $mailSenderName;

        $mail = new PHPMailer;
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = $mailHost; // Specify main and backup SMTP servers
        $mail->SMTPAuth = $mailSMTPAuth; // Enable SMTP authentication
        $mail->Username = $mailUsername; // SMTP username or mail
        $mail->Password = $mailPassword; // SMTP password
        $mail->SMTPSecure = $mailSMTPSecure; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $mailPort; // TCP port to connect to
        $mail->CharSet = 'utf-8';
        $mail->setFrom($mailSenderAddress, $mailSenderName);
        $mail->addAddress($sendMailAdress, $sendMailName); // Add a recipient
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $sendMailSubject;
        $mail->Body = $sendMailMessage;
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

}
?>