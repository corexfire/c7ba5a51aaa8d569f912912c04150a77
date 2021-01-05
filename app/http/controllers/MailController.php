<?php


namespace App\http\controllers;

use App\Models\User;
use App\Models\Mail;

use App\mail\mail as Mailing;

class MailController extends Controller
{
    public function send() {
        $user = $this->isAuthorized();
        if (!$user) {
            return $this->response(['message' => 'unauthorized'], 401);
        }

        $data = $this->mailSerializer($this->request());
        if (!$this->is_valid) {
            return $this->response(['message' => 'subject and body are required']);
        }

        $mail = $user->mails()->create([
            'title' => $data['title'],
            'body' => $data['body']
        ]);

        $mailing = new Mailing();
        $mailing->send(MAIL_ADMIN, $user->email, $mail->title, $mail->body);
        return $this->response(
            ['message' => 'success send mail to: ' . $user->email],
            201
        );
    }
}