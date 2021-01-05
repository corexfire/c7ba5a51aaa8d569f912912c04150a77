<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
class Token extends Eloquent
{
    protected $table = 'tbl_token';

    protected $fillable = [
        'token'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}