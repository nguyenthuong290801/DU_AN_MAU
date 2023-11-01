<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Request;
use app\core\ModelFactory;

class CustomerController extends Controller
{
    public function index()
    {
        $users = ModelFactory::all('user');

        $this->setLayout('admin');
        
        return $this->view('admin/pages/customer/index', [
            'users' => $users
        ]);
    }
}