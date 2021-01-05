<?php


namespace App\queue;

require_once 'inc.php';
require_once "sendMailQueue.php";

use Illuminate\Queue\Worker;

$worker = new Worker($queue->getQueueManager(), null, null);

// Run indefinitely
while (true) {
    // Parameters:
    // 'default' - connection name
    // 'default' - queue name
    // delay
    // time before retries
    // max number of tries

    $worker->pop('default', 'default', 0, 3, 1);
}