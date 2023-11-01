<?php

namespace app\models;

use app\core\base\ErrorModule;
use app\core\base\Model;

class Category extends ErrorModule
{
    public string $category_name;
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->model->table('category');
        $this->model->columns([
            'id',
            'category_name',
            'type',
            'status',
            'deleted_at',
            'created_at',
            'updated_at'
        ]);
    }

    public function rules(): array
    {
        return [
            'category_name' => [self::RULE_REQUIRED],
        ];
    }
}
