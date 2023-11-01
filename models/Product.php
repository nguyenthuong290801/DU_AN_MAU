<?php

namespace app\models;

use app\core\base\Model;
use app\core\base\ErrorModule;

class Product extends ErrorModule
{
    public string $product_name;
    public string $price;
    public string $sale_price;
    public string $category_id;
    public string $description;
    public string $thumbnail;
    public $status;
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->model->table('product');
        $this->model->columns([
            'id',
            'product_name',
            'slug',
            'price',
            'sale_price',
            'description',
            'thumbnail',
            'category_id',
            'status',
            'deleted_at',
            'created_at',
            'updated_at'
        ]);
    }

    public function rules(): array
    {
        return [
            'product_name' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'sale_price' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'category_id' => [self::RULE_REQUIRED],
            'status' => [self::RULE_REQUIRED]
        ];
    }
}
