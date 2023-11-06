<?php
require 'vendor/autoload.php'; // Include the PHPMailer library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Initialize PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'your-smtp-server.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; // Your email address
    $mail->Password = 'your-email-password'; // Your email password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; // SMTP port

    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('your-personal-email@example.com', 'Your Name'); // Your personal email address

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

    if ($mail->send()) {
        echo 'Message sent successfully.';
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
