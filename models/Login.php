<?php

namespace app\models;

use app\core\base\ErrorModule;
use app\core\base\Model;

class Login extends ErrorModule
{
    public string $email;
    public string $password;
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();

    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
        ];
    }
}