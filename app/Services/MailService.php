<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    private string $lastError = '';

    public function send($to, $subject, $body)
    {
        require_once __DIR__ . '/../../config/mail.php';

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();

            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT;

            $mail->setFrom(
                SMTP_FROM,
                SMTP_NAME
            );

            $mail->addAddress($to);

            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();

        } catch (Exception $e) {
            $this->lastError = $e->getMessage();
            return false;
        }
    }

    public function getLastError(): string
    {
        return $this->lastError;
    }
}
