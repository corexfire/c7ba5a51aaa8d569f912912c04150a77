<?php


namespace App\Migrate;

use Illuminate\Database\Capsule\Manager as Capsule;
class User
{
    public function migrate() {
        Capsule::schema()->create('tbl_user', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('passwd');
            $table->timestamps();
        });
    }

    public function drop() {
        Capsule::schema()->dropIfExists('tbl_user');
    }
}