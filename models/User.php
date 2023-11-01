<?php

namespace app\models;

use app\core\base\Model;

class User extends Model
{
    protected $table = 'user';
    
    protected $columns = [
        'email',
        'password',
    ];
}
