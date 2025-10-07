<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = '';         // ← Change this
    $mail->SMTPAuth = true;
    $mail->Username = '';  // ← Your domain email
    $mail->Password = '';     // ← Email password
    $mail->SMTPSecure = 'ssl';                   // Or 'tls' if port is 587
    $mail->Port = 465;

    // From & To
    $mail->setFrom('', 'Website Contact'); // fixed sender
    $mail->addAddress('asowemedia@gmail.com'); // Where you want to receive messages

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'] ?? 'New Message from Website';
    $mail->Body    = "
        <h2>New Contact Form Message</h2>
        <p><strong>Name:</strong> {$_POST['name']}</p>
        <p><strong>Email:</strong> {$_POST['email']}</p>
        <p><strong>Phone:</strong> {$_POST['number']}</p>
        <p><strong>Message:</strong><br>{$_POST['message']}</p>
    ";

    $mail->send();
     // Success message + auto refresh
    echo "<script>
        alert('Thank You for Getting in Touch!');
        window.location.href = './index.html';
    </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
