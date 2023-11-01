<?php

namespace app\controllers\client;

use app\core\Controller;
use app\core\ModelFactory;
use app\core\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = ModelFactory::all('Post');
        return $this->view('client/pages/blog', [
            'posts' => $posts,
        ]);
    }

    public function show(Request $request) {
        
        $posts = ModelFactory::find('Post', $request->getParam());
        return $this->view('client/pages/blog_detail', [
            'posts' => $posts,
        ]);
    }
}
