<?php


namespace App\http\controllers;

use App\Models\User;

class PostController extends Controller
{


    public function index()
    {
        $data = $this->userSerializer($this->request());

        $user = new User();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->set_password($data['password']);
        $user->save();


        return $this->response(
            ["message" => 'success create user '],
            201
        );
    }
}