<?php


namespace App\Migrate;

use Illuminate\Database\Capsule\Manager as Capsule;

class Mail
{
    public function migrate() {
        Capsule::schema()->create('tbl_mail', function ($table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained('tbl_user')->onDelete('cascade');
            $table->string('title');
            $table->string('body');
            $table->timestamps();
        });
    }

    public function drop() {
        Capsule::schema()->dropIfExists('tbl_mail');
    }
}