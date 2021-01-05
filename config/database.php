<?php

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;
$capsule->addConnection([
    "driver" => getenv('DB_DRIVER'),
    "host" => getenv('DB_HOST'),
    "database" => getenv('DB_NAME'),
    "username" => getenv('DB_USER'),
    "password" => getenv('DB_PASSWORD'),
    "port" => getenv('DB_PORT'),
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();
