<?php

namespace app\models;

use app\core\base\Model;

class Post extends Model
{
    public Model $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->model->table('post');
        $this->model->columns([
            'id',
            'post_name',
            'description',
            'thumbnail',
            'view',
            'cmt',
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
            
        ];
    }
}
