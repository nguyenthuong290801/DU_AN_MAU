<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Debug;
use app\core\Request;
use app\core\ModelFactory;
use app\core\Response;
use app\models\Product;

class ProductController extends Controller
{

    public function index(Request $request)
    {

        $offSet = $request->getParam();
        $rowCount = 5;
        $products = ModelFactory::paginate('Product', $offSet, $rowCount);

        $this->setLayout('admin');

        return $this->view('admin/pages/product/index', [
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $productModel = new Product;

        if ($request->isPost()) {
            $productModel->loadData($request->getData());

            if ($productModel->validate()) {
                $this->setLayout('admin');

                ModelFactory::create('Product', $request->getData());

                return $this->view('admin/pages/product/create', [
                    'model' => $productModel,
                ]);
            }
        }

        $this->setLayout('admin');

        return $this->view('admin/pages/product/create', [
            'model' => $productModel,
        ]);
    }

    public function destroy(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::softDelete('Product', $request->getParam());

            $products = ModelFactory::all('Product');

            $this->setLayout('admin');

            return $this->view('admin/pages/product/index', [
                'products' => $products
            ]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::delete('Product', $request->getParam());

            $products = ModelFactory::all('Product');

            $this->setLayout('admin');

            return $this->view('admin/pages/product/restore', [
                'products' => $products
            ]);
        }
    }

    public function update(Request $request)
    {

        if ($request->isPost()) {

            ModelFactory::update('Product', $request->getParam(), $request->getData());
        }

        $product = ModelFactory::find('Product', $request->getParam());

        $this->setLayout('admin');

        return $this->view('admin/pages/product/update', [
            'item' => $product
        ]);
    }

    public function restore(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::restore('Product', $request->getParam());

            $offSet = $request->getParam();
            $rowCount = 5;
            $products = ModelFactory::paginate('Product', $offSet, $rowCount);

            $this->setLayout('admin');

            return $this->view('admin/pages/product/restore', [
                'products' => $products
            ]);
        }

        $offSet = $request->getParam();
        $rowCount = 5;
        $products = ModelFactory::paginateWithTrashed('Product', $offSet, $rowCount);

        $this->setLayout('admin');

        return $this->view('admin/pages/product/restore', [
            'products' => $products
        ]);
    }

    public function readCmt(Request $request)
    {
        if($request->isPost()) {
            ModelFactory::delete('Comment', $request->getParam());
            Response::redirectCurrentPage();
        }
        $offSet = $request->getParam();
        $rowCount = 5;
        $cmts = ModelFactory::paginate('Comment', $offSet, $rowCount);
        $this->setLayout('admin');

        return $this->view('admin/pages/product/cmt', [
            'cmts' => $cmts
        ]);
    }
}
