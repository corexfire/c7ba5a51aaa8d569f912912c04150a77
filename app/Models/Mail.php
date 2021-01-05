<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
class Mail extends Eloquent
{
    protected $table = 'tbl_mail';

    protected $fillable = [
        'title', 'body',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}