<?php

namespace app\core;

use app\core\Debug;

class ModelFactory
{
    public static function create($modelClassName, $data)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        $model->model->create($data);

        return $model;
    }

    public static function update($modelClassName, $id, array $data)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        $model->model->update($id, $data);

        return $model;
    }

    public static function delete($modelClassName, $id)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        $model->model->delete($id);

        return $model;
    }

    public static function softDelete($modelClassName, $id)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        $model->model->softDelete($id);

        return $model;
    }

    public static function restore($modelClassName, $id)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        $model->model->restore($id);

        return $model;
    }

    public static function find($modelClassName, $id)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        
        return $model->model->find($id);
    }

    public static function findSlug($modelClassName, $id)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        
        return $model->model->findSlug($id);
    }

    public static function findCmt($modelClassName, $id)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
        
        return $model->model->findCmt($id);
    }

    public static function withTrashed($modelClassName)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
    
        return $model->model->withTrashed();
    }

    public static function all($modelClassName)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
    
        return $model->model->all();
    }

    public static function paginateWithTrashed($modelClassName, $page, $perPage)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
    
        return $model->model->paginateWithTrashed($page, $perPage);
    }

    public static function paginate($modelClassName, $page, $perPage)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
    
        return $model->model->paginate($page, $perPage);
    }

    public static function login($modelClassName, $email, $passowrd)
    {

        $fullClassName = 'app\models\\' . $modelClassName;
        $model = new $fullClassName();
    
        return $model->login($email, $passowrd);
    }
}
