<?php

namespace Http\Forms;

use core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate($email, $password): bool
    {
        //validate email and password
        if (!Validator::email($email)) {
            $this->errors['email'] = "A valid email address and password must be provided";
        }

        if (!Validator::string($password, 7)) {
            $this->errors['password'] = "A valid password must be provided";
        }
        return empty($this->errors);
    }

    //getter since the array variable is protected within the class
    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $value){
        return $this->errors[$key] = $value;
    }

}