<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'tbl_user';

    protected $fillable = [
        'name', 'email', 'passwd',
    ];

    protected $hidden = [
        'passwd',
    ];

    public function tokens() {
        return $this->hasMany('App\Models\Token');
    }

    public function mails() {
        return $this->hasMany('App\Models\Mail');
    }

    public function check_password($password) {
        return md5($password) == $this->passwd;
    }

    public function set_password($password) {
        $this->passwd = md5($password);
    }
}