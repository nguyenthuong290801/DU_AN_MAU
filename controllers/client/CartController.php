<?php

namespace app\controllers\client;

use app\core\Controller;
use app\core\Debug;
use app\core\ModelFactory;
use app\core\Request;
use app\email\Mailer;
use app\models\Order;

class CartController extends Controller
{
    public function index(Request $request)
    {   
        if($request->isPost()) {
            echo "<script>alert('Thành công')</script>";
            $data = $request->getData();
            $title = 'Don hang';
            $content = 'Đơn hàng của bạn có giá'.$data['total'];
            Debug::var_dump($data);
            // Mailer::sendMail($data['cart_email'], $title, $content, $data['cart_address'],$data['cart_phone'],$data['cart_name']);
            $order = new Order();
            $order->create($data);
            return $this->view('client/pages/cart', [

            ]);
        }

        return $this->view('client/pages/cart', [

        ]);
    }

    public function store(Request $request)
    {
        $id = $request->getParam();
        $product = ModelFactory::find('Product', $id);
        $_SESSION['cart'][] = $product;
    }
}