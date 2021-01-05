<?php


namespace App\Migrate;

use Illuminate\Database\Capsule\Manager as Capsule;

class Token
{
    public function migrate() {
        Capsule::schema()->create('tbl_token', function ($table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained('tbl_user')->onDelete('cascade');
            $table->string('token')->unique();
            $table->timestamps();
        });
    }

    public function drop() {
        Capsule::schema()->dropIfExists('tbl_token');
    }
}