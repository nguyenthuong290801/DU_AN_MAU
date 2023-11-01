<?php

namespace app\models;

use app\core\base\ErrorModule;
use app\core\base\Model;

class Comment extends ErrorModule
{
    public string $review;
    public string $comment_name;
    public string $email;
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->model->table('comment');
        $this->model->columns([
            'id',
            'review',
            'comment_name',
            'email',
            'user_id',
            'product_id',
            'deleted_at',
            'created_at',
            'updated_at'
        ]);
    }

    public function rules(): array
    {
        return [
            // 'review' => [self::RULE_REQUIRED],
            // 'comment_name' => [self::RULE_REQUIRED],
            // 'email' => [self::RULE_REQUIRED, self::RULE_EMAIL]
        ];
    }
}
