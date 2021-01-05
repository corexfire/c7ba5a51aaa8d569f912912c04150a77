<?php


namespace App\http\controllers;

use App\Models\User;
use App\Models\Token;
use App\http\Auth\Controllers\AbstractAuthController;
use App\lib\inc;

class AuthController extends Controller
{
    public function login() {

        $clientId     = CLIENT_ID;
        $clientSecret = CLIENT_SECRET;

        $data = $this->serializer($this->request());
        if (!$this->is_valid) {
            return $this->response(['message' => 'Email or Password is invalid']);
        }

        $user = User::where('email', '=', $data['email'])->first();


        if ($user && $user->check_password($data['password'])) {
            $userid= $user['id'];
            $check = Token::where([['user_id','=',$user['id']],['token','=',base64_encode("$userid:$clientId:$clientSecret")]])->get();
            if(!$check->count() >0){
                $result = $user->tokens()->create([
                    'token' => base64_encode("$userid:$clientId:$clientSecret"),
                ]);
                return $this->response(['token' => $result->token]);
            }else{
                return $this->response(['token' => $check[0]['token']]);
            }


        }
        return $this->response(['message' => 'email or password is invalid'], 400);
    }

}