<?php


namespace App\http\controllers;

use App\Models\User;

abstract  class Controller
{
    public function request() {
        return json_decode(file_get_contents('php://input'), true);
    }

    public $userFields = ['email','name', 'password'];

    public function userSerializer($data) {
        $result = [];
        foreach ($data as $userFields => $value) {
            if (in_array($userFields, $this->userFields)) {
                $result[$userFields] = $value;
            }
        }
        return $result;
    }


    public $fields = ['email', 'password'];
    public $is_valid = true;

    public function serializer($data) {
        $result = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $result[$field] = $value;
            }
        }
        return $result;
    }

    public $mailFields = ['title', 'body'];
    public function mailSerializer($data) {
        $result = [];
        foreach ($data as $mailFields => $value) {
            if (in_array($mailFields, $this->mailFields)) {
                $result[$mailFields] = $value;
            }
        }

        if (count($result) <= 0) {
            $this->is_valid = false;
        }
        foreach ($result as $key => $value) {
            if (!in_array($mailFields, $this->mailFields)) {
                $this->is_valid = false;
            }
        }

        return $result;
    }

    public function response($data, $status=200) {
        http_response_code($status);
        echo json_encode($data);
    }

    public function isAuthorized() {
        $result = apache_request_headers();
        if ($result['Authorization']) {
            $token = $result['Authorization'];

            $user = User::whereHas('tokens', function ($q) use ($token) {
                $q->where('token', $token);
            })->first();

            if ($user) {
                return $user;
            }
        }

        return false;
    }
}