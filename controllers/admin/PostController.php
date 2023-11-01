<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Debug;
use app\core\Request;
use app\core\ModelFactory;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $offSet = $request->getParam();
        $rowCount = 5;
        $posts = ModelFactory::paginate('Post', $offSet, $rowCount);

        $this->setLayout('admin');
        
        return $this->view('admin/pages/post/index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::create('Post', $request->getData());
            
        }

        $this->setLayout('admin');

        return $this->view('admin/pages/post/create');
    }

    public function destroy(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::softDelete('Post', $request->getParam());

            $posts = ModelFactory::all('Post');

            $this->setLayout('admin');

            return $this->view('admin/pages/post/index', [
                'posts' => $posts
            ]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::delete('Post', $request->getParam());

            $posts = ModelFactory::withTrashed('Post');

            $this->setLayout('admin');

            return $this->view('admin/pages/post/restore', [
                'posts' => $posts
            ]);
        }
    }

    public function update(Request $request)
    {

        if ($request->isPost()) {

            ModelFactory::update('Post', $request->getParam(), $request->getData());
        }

        $post = ModelFactory::find('Post', $request->getParam());

        $this->setLayout('admin');

        return $this->view('admin/pages/post/update', [
            'item' => $post,
        ]);
    }

    public function restore(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::restore('Post', $request->getParam());

            $offSet = $request->getParam();
            $rowCount = 5;
            $posts = ModelFactory::paginateWithTrashed('Post', $offSet, $rowCount);

            $this->setLayout('admin');

            return $this->view('admin/pages/post/restore', [
                'posts' => $posts
            ]);
        }
        
        $offSet = $request->getParam();
        $rowCount = 5;
        $posts = ModelFactory::paginateWithTrashed('Post', $offSet, $rowCount);

        $this->setLayout('admin');

        return $this->view('admin/pages/post/restore', [
            'posts' => $posts
        ]);
    }
}