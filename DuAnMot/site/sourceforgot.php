<?php

$mail = new Mailer();

require 'content/mailing/PHPMailer/src/Exception.php';
require 'content/mailing/PHPMailer/src/PHPMailer.php';
require 'content/mailing/PHPMailer/src/SMTP.php';


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
   

    public function sendMail($title, $content, $addressMail)
    {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;  // Set to 0 to suppress debug output
            $mail->isSMTP();
            $mail->Charset = 'utf-8'; // Use 'Charset' instead of 'charset'
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'leminhhuy1604@gmail.com';
            $mail->Password = 'fxyu dnmr csxk yjsp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('leminhhuy1604@gmail.com', 'Huy');
            $mail->addAddress($addressMail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $content;

            // Send the email
            $mail->send();
            // You may want to remove the following echo statement
            // or customize it based on your needs
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // You may want to log the error or handle it differently
            // instead of echoing it to the user
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

?>