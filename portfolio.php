<?php

use App\About;
use PHPMailer\PHPMailer\PHPMailer;

require 'includes/app.php';

$name = '';
$email = '';
$phone = '';

// $errores = [];

$portfolio = About::where('title', 'Portfolio');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // if (!$name) {
    //     $errores[] = 'You must enter your name.';
    // }
    // if (!$email) {
    //     $errores[] = 'You must enter your email.';
    // }
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errores[] = 'Invalid email format.';
    // }
    // if (!$phone) {
    //     $errores[] = 'You must enter your phone.';
    // }

    // if (empty($errores)) {

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

        $phpmailer->setFrom('no-reply@aetos.life');
        $phpmailer->addAddress($email);
        $phpmailer->Subject = 'Check out our portfolio!';
        $phpmailer->addAttachment(PORTFOLIO_URL . $portfolio->file, 'Aetos Project Portfolio');

        $phpmailer->isHTML(true);

        $contenido = "<html>";
        $contenido .= "<head>";
        $contenido .= "<meta charset='UTF-8'>";
        $contenido .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        $contenido .= "<title>Email PHPMailer</title>";
        $contenido .= "<style>";
        $contenido .= "body { margin: 0; padding: 0; background-color: #00091b; font-family: Arial, sans-serif; }";
        $contenido .= ".container { max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; }";
        $contenido .= ".header { background-color: #00aad7; color: white; text-align: center; padding: 20px; font-size: 24px; font-weight: bold; }";
        $contenido .= ".content { padding: 20px; text-align: center; color: #666666; font-size: 18px; }";
        $contenido .= ".button { display: inline-block; background-color: #00ffff; color: #00091b; padding: 15px 25px; text-decoration: none; font-size: 18px; font-weight: bold; border-radius: 5px; margin-top: 20px; }";
        $contenido .= ".footer { background-color: #666666; color: white; text-align: center; padding: 10px; font-size: 14px; }";
        $contenido .= "@media (max-width: 600px) { .content { font-size: 16px; } .button { font-size: 16px; padding: 12px 20px; } }";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='container'>";
        $contenido .= "<div class='header'>Aetos</div>";
        $contenido .= "<div class='content'>";
        $contenido .= "<p>Thank you for your interest in our work! You can find our full portfolio in the attached file. We hope you like it and are available for any questions. Enjoy!</p>";
        $contenido .= "<a href='https://aetos.primepixeldev.site/#services' class='button'>More Information</a>";
        $contenido .= "</div>";
        $contenido .= "<div class='footer'>&copy; " . date('Y') . " Aetos. All rights reserved.</div>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;

        $enviado = $phpmailer->send();

        if ($enviado) {
            header('Location: /?success=1');
            exit;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }
    // } 
}
