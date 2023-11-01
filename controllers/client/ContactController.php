<?php

namespace app\controllers\client;

use app\core\Controller;
use app\core\Request;

class ContactController extends Controller
{
    public function index()
    {
        return $this->view('client/pages/contact', [

        ]);
    }
}