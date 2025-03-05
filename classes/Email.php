<?php

namespace App;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $name;
    public $token;

    public function __construct($email, $name, $token)
    {
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
    }

    public function sendInstructions()
    {
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

            $phpmailer->setFrom('accounts@aetos.life');
            $phpmailer->addAddress($this->email, $this->name);
            $phpmailer->Subject = 'Instructions to reset your password';

            $phpmailer->isHTML(true);

            $contenido = "<html>";
            $contenido .= "<head>";
            $contenido .= "<meta charset='UTF-8'>";
            $contenido .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            $contenido .= "<title>Reset Password</title>";
            $contenido .= "</head>";
            $contenido .= "<body style='margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #00091b; color: #ffffff;'>";
            $contenido .= "<table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' align='center' style='max-width: 600px; margin: 0 auto; background-color: #001a33; border-radius: 8px; padding: 20px;'>";
            $contenido .= "<tr>";
            $contenido .= "<td align='center' style='padding: 10px 0;'>";
            $contenido .= "<h2 style='color: #00ffff;'>Password Reset Request</h2>";
            $contenido .= "</td>";
            $contenido .= "</tr>";
            $contenido .= "<tr>";
            $contenido .= "<td style='padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #cccccc;'>";
            $contenido .= "<p>Hi, <strong style='color: #00aad7;'>" . $this->name . "</strong>,</p>";
            $contenido .= "<p>You have requested to reset your Aetos administration password. To do so, click the button below:</p>";
            $contenido .= "<p style='text-align: center;'>";
            $contenido .= "<a href='http://localhost:3000/recovery.php?token=" . $this->token . "' style='background-color: #00aad7; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Reset Password</a>";
            $contenido .= "</p>";
            $contenido .= "<p>If you did not request this change, you can ignore this message.</p>";
            $contenido .= "</td>";
            $contenido .= "</tr>";
            $contenido .= "<tr>";
            $contenido .= "<td align='center' style='padding: 20px; font-size: 14px; color: #666666;'>";
            $contenido .= "&copy; " . date('Y') . " Aetos. All rights reserved.";
            $contenido .= "</td>";
            $contenido .= "</tr>";
            $contenido .= "</table>";
            $contenido .= "</body>";
            $contenido .= "</html>";

            $phpmailer->Body = $contenido;

            $enviado = $phpmailer->send();

            return $enviado;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
        }
    }
}
