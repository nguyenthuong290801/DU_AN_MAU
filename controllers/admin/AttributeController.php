<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Debug;
use app\core\Request;
use app\core\ModelFactory;
use app\models\Product;

class AttributeController extends Controller
{

    public function index(Request $request)
    {

        $offSet = $request->getParam();
        $rowCount = 5;
        $attributes = ModelFactory::paginate('Attribute', $offSet, $rowCount);

        $this->setLayout('admin');

        return $this->view('admin/pages/attribute/index', [
            'attributes' => $attributes
        ]);
    }

    public function store(Request $request)
    {
        $attributeModel = new Product;
        $products = ModelFactory::all('Product');
        
        if ($request->isPost()) {
            $attributeModel->loadData($request->getData());
            
            if ($attributeModel->validate()) {
                $this->setLayout('admin');

                ModelFactory::create('Attribute', $request->getData());
                
                return $this->view('admin/pages/attribute/create', [
                    'model' => $attributeModel,
                    'products' => $products,
                    
                ]);
            }
        }

        $this->setLayout('admin');

        return $this->view('admin/pages/attribute/create', [
            'model' => $attributeModel,
            'products' => $products,
        ]);
    }

    public function destroy(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::softDelete('Attribute', $request->getParam());

            $attributes = ModelFactory::all('Attribute');

            $this->setLayout('admin');

            return $this->view('admin/pages/attribute/index', [
                'attributes' => $attributes
            ]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::delete('Attribute', $request->getParam());

            $attributes = ModelFactory::all('Attribute');

            $this->setLayout('admin');

            return $this->view('admin/pages/attribute/restore', [
                'attributes' => $attributes
            ]);
        }
    }

    public function update(Request $request)
    {

        if ($request->isPost()) {

            ModelFactory::update('Attribute', $request->getParam(), $request->getData());
        }

        $attributes = ModelFactory::find('Attribute', $request->getParam());

        $this->setLayout('admin');

        return $this->view('admin/pages/attribute/update', [
            'item' => $attributes
        ]);
    }

    public function restore(Request $request)
    {
        if ($request->isPost()) {

            ModelFactory::restore('Attribue', $request->getParam());

            $offSet = $request->getParam();
            $rowCount = 5;
            $attributes = ModelFactory::paginate('Attribute', $offSet, $rowCount);

            $this->setLayout('admin');

            return $this->view('admin/pages/attribute/restore', [
                'attributes' => $attributes
            ]);
        }

        $offSet = $request->getParam();
        $rowCount = 5;
        $attributes = ModelFactory::paginate('Attribute', $offSet, $rowCount);

        $this->setLayout('admin');

        return $this->view('admin/pages/attribute/restore', [
            'attributes' => $attributes
        ]);
    }
}
