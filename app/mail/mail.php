<?php


namespace App\mail;

require "inc.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class mail
{
    public $mail;

    public function __construct() {
        $this->setup();
    }

    public function setup() {
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->SMTPDebug = false;
            $this->mail->isSMTP();
            $this->mail->Host       = MAIL_HOST;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = MAIL_USERNAME;
            $this->mail->Password   = MAIL_PASSWORD;
            $this->mail->Port       = MAIL_PORT;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$e->ErrorInfo}";
        }
    }

    public function send($from, $to, $subject, $body) {
        $this->mail->setFrom($from);
        $this->mail->addAddress($to);

        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
        $this->mail->AltBody = $body;

        $this->mail->send();
    }
}