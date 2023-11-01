<?php

namespace app\models;

use app\core\base\ErrorModule;
use app\core\base\Model;

class Attribute extends ErrorModule
{
    public string $size;
    public string $color;
    public string $quantity;
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->model->table('attribute');
        $this->model->columns([
            'id',
            'size',
            'color',
            'quantity',
            'product_id',
            'deleted_at',
            'created_at',
            'updated_at'
        ]);
    }

    public function rules(): array
    {
        return [
            'size' => [self::RULE_REQUIRED],
            'color' => [self::RULE_REQUIRED],
            'quantity' => [self::RULE_REQUIRED],
        ];
    }
}
