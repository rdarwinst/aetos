<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'includes/app.php';

$name = '';
$email = '';
$brand = '';
$country = '';
$subject = '';
$message = '';

// $errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $brand = $_POST["brand"];
    $country = $_POST["country"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // if (!$name) {
    //     $errores[] = "Please enter your name.";
    // }
    // if (!$email) {
    //     $errores[] = "Please enter your email address.";
    // }
    // if (!$brand) {
    //     $errores[] = "Please specify your brand.";
    // }
    // if (!$country) {
    //     $errores[] = "Please select your country.";
    // }
    // if (!$subject) {
    //     $errores[] = "Please enter a subject.";
    // }
    // if (!$message) {
    //     $errores[] =  "Please enter your message.";
    // }

    // if (empty($errores)) {
    // Looking to send emails in production? Check out our Email API/SMTP product!
    $phpmailer = new PHPMailer();

    try {
        $phpmailer->SMTPDebug = SMTP::DEBUG_SERVER;
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '23e4a27c8f08f6';
        $phpmailer->Password = 'aaaba31fa04c22';
        // $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $phpmailer->CharSet = 'UTF-8';

        $phpmailer->setFrom('no-reply@aetos.life', 'No Reply');
        $phpmailer->addAddress('contact@aetos.life');

        $phpmailer->isHTML(true);
        $phpmailer->Subject = "You've Received a New Message";

        $contenido = "<!DOCTYPE html>";
        $contenido .= "<html>";
        $contenido .= "<head>";
        $contenido .= "<meta charset='UTF-8'>";
        $contenido .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
        $contenido .= "<title>New Contact Form Message</title>";
        $contenido .= "<style>";
        $contenido .= "body { font-family: Arial, sans-serif; background-color: #00091b; margin: 0; padding: 0; color: #ffffff; }";
        $contenido .= ".container { width: 100%; max-width: 600px; margin: 20px auto; background-color: #00aad7; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 255, 255, 0.5); }";
        $contenido .= ".header { text-align: center; font-size: 24px; font-weight: bold; color: #00ffff; margin-bottom: 20px; }";
        $contenido .= ".content { background-color: #ffffff; color: #00091b; padding: 15px; border-radius: 5px; text-align: left; }";
        $contenido .= ".content ul { list-style: none; padding: 0; }";
        $contenido .= ".content ul li { margin-bottom: 10px; }";
        $contenido .= ".footer { margin-top: 20px; text-align: center; font-size: 14px; color: #666666; }";
        $contenido .= "@media screen and (max-width: 600px) { .container { width: 90%; padding: 15px; } .header { font-size: 20px; } .content { font-size: 16px; } }";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='container'>";
        $contenido .= "<div class='header'>New Contact Form Message</div>";
        $contenido .= "<div class='content'>";
        $contenido .= "<p>Hi Aetos,</p>";
        $contenido .= "<p>You have received a new message from the contact form on your website. Here are the details:</p>";
        $contenido .= "<ul>";
        $contenido .= "<li><strong>Name:</strong> " . $name . "</li>";
        $contenido .= "<li><strong>Email:</strong> " . $email . "</li>";
        $contenido .= "<li><strong>Brand:</strong> " . $brand . "</li>";
        $contenido .= "<li><strong>Country:</strong> " . $country . "</li>";
        $contenido .= "<li><strong>How did you hear about Aetos?:</strong> " . $subject . "</li>";
        $contenido .= "</ul>";
        $contenido .= "<p><strong>Type of service you are interested in:</strong></p>";
        $contenido .= "<p>" . $message . "</p>";
        $contenido .= "</div>";
        $contenido .= "<div class='footer'>";
        $contenido .= "&copy; " . date("Y") . " Aetos. All rights reserved.";
        $contenido .= "</div>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;

        $enviado = $phpmailer->send();

        if ($enviado) {
            header('Location: /?success=2');
            exit;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }
    // }
}
