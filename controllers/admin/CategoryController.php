<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Request;
use app\core\ModelFactory;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $offSet = $request->getParam();
        $rowCount = 5;
        $categories = ModelFactory::paginate('Category', $offSet, $rowCount);
        
        $this->setLayout('admin');
        
        return $this->view('admin/pages/category/index', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::create('Category', $request->getData());
            
        }

        $this->setLayout('admin');

        return $this->view('admin/pages/category/create');
    }

    public function destroy(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::softDelete('Category', $request->getParam());

            $posts = ModelFactory::all('Category');

            $this->setLayout('admin');

            return $this->view('admin/pages/post/index', [
                'posts' => $posts
            ]);
        }
    }

    public function update(Request $request)
    {

        if ($request->isPost()) {

            ModelFactory::update('Category', $request->getParam(), $request->getData());
        }

        $post = ModelFactory::find('Category', $request->getParam());

        $this->setLayout('admin');

        return $this->view('admin/pages/category/update', [
            'item' => $post,
        ]);
    }

    public function restore(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::restore('Category', $request->getParam());

            $categories = ModelFactory::withTrashed('Category');

            $this->setLayout('admin');

            return $this->view('admin/pages/category/restore', [
                'categories' => $categories
            ]);
        }
        
        $categories = ModelFactory::withTrashed('Category');

        $this->setLayout('admin');

        return $this->view('admin/pages/category/restore', [
            'categories' => $categories
        ]);
    }

}