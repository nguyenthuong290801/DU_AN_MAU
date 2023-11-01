<?php

namespace app\models;

use app\core\base\ErrorModule;
use app\core\base\Model;

class Register extends ErrorModule
{
    public string $fullname;
    public string $email;
    public string $password;
    public string $confirmPassword;
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function rules(): array
    {
        return [
            'fullname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}
