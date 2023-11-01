<?php

namespace app\controllers\auth;

use app\core\Controller;
use app\core\Debug;
use app\core\Request;
use app\models\Register; 
use app\core\facades\Auth;
use app\core\ModelFactory;
use app\core\Response;
use app\models\Login;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginModel = new Login();
        
        if ($request->isPost()) {
            $loginModel->loadData($request->getData());
            
            $user = ModelFactory::login('User', $loginModel->email, $loginModel->password);
            
            if($loginModel->validate() && $user) {
                $_SESSION['user'] = $user;
                
                Response::redirect('/admin');
            }

            $this->setLayout('main');
            
            return $this->view('client/pages/login', [
                'model' => $loginModel,
            ]);
        }

        $this->setLayout('main');

        return $this->view('client/pages/login', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new Register();
        
        if ($request->isPost()) {

            $registerModel->loadData($request->getData());

            if ($registerModel->validate()) {
                $user = new User();
                $data = $request->getData();
                array_pop($data);
                $user->create($data);
            }
            
            $this->setLayout('main');
            
            return $this->view('client/pages/register', [
                'model' => $registerModel,
            ]);

        }

        $this->setLayout('main');

        return $this->view('client/pages/register', [
            'model' => $registerModel,
        ]);
    }
}
