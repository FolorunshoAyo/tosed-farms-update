<?php
// EmailController.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController {
    
    public function sendEmail($from, $to, $message) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your@example.com';
            $mail->Password = 'your_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('info@tosedventures.com', 'Tosed Farms Website');
            $mail->addAddress('recipient@example.com');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Subject of the Email';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

            // Send email
            $mail->send();
            echo 'Email has been sent successfully!';
        } catch (Exception $e) {
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }
    }
}
