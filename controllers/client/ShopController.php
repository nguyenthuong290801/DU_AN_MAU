<?php

namespace app\controllers\client;

use app\core\Controller;
use app\core\Debug;
use app\core\ModelFactory;
use app\core\Request;
use app\core\Response;
use app\models\Comment;

class ShopController extends Controller
{
    public function index()
    {
        $products = ModelFactory::all('Product');

        return $this->view('client/pages/shop', [
            'products' => $products,
        ]);
    }

    public function show(Request $request)
    {

        $product = ModelFactory::findSlug('Product', $request->getParam());
        $id = $product['id'];
        $cmt = ModelFactory::findCmt('Comment',$id);
        
        return $this->view('client/pages/product_detail', [
            'item' => $product,
            'cmt' => $cmt,
        ]);
    }

    public function store(Request $request)
    {
        $productModel = new Comment;

        if ($request->isPost()) {
            $productModel->loadData($request->getData());

            if ($productModel->validate()) {
                $this->setLayout('main');

                ModelFactory::create('Comment', $request->getData());

                return Response::redirectCurrentPage();
            }
        }
    }
}
