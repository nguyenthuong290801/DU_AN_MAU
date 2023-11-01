<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->setLayout('admin');
        
        return $this->view('admin/pages/index', [

        ]);
    }
}