<?php


namespace App\queue;


class sendMailQueue
{
    public function sendQueue($job, $data)
    {
        echo "Sending email to: {$data['email']}" . PHP_EOL;
    }
}