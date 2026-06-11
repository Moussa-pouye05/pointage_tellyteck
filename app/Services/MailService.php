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
            $mail->Username = trim(SMTP_USER);
            $mail->Password = trim(SMTP_PASS);
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT;
            $mail->CharSet = 'UTF-8';
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            $mail->setFrom(
                trim(SMTP_FROM),
                trim(SMTP_NAME)
            );

            $mail->addAddress(trim($to));
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body);

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
