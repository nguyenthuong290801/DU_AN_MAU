<?php

use app\controllers\admin\AttributeController;
use app\controllers\admin\CategoryController;
use app\core\Application;
use app\controllers\auth\AuthController;
use app\controllers\client\HomeController;
use app\controllers\client\ShopController;
use app\controllers\client\BlogController;
use app\controllers\client\AboutController;
use app\controllers\client\ContactController;
use app\controllers\client\CartController;
use app\controllers\admin\DashboardController;
use app\controllers\admin\OrderController;
use app\controllers\admin\PostController;
use app\controllers\admin\ProductController;

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],                                                                                                                                                                                                                       
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->group(['prefix' => '/admin'], function ($route) use ($app) {
    $route->get('', [new DashboardController(), 'index']);
    $route->get('/product/{id}', [new ProductController(), 'index']);
    $route->get('/product-restore/{id}', [new ProductController(), 'restore']);
    $route->post('/product-restore/{id}', [new ProductController(), 'restore']);
    $route->get('/product-create', [new ProductController(), 'store']);
    $route->post('/product-create', [new ProductController(), 'store']);
    $route->get('/product-update/{id}', [new ProductController(), 'update']);
    $route->post('/product-update/{id}', [new ProductController(), 'update']);
    $route->post('/product-destroy/{id}', [new ProductController(), 'destroy']);
    $route->post('/product-delete/{id}', [new ProductController(), 'delete']);
    $route->get('/product-cmt/{id}', [new ProductController(), 'readCmt']);
    $route->post('/product-cmt/{id}', [new ProductController(), 'readCmt']);

    $route->get('/attribute/{id}', [new AttributeController(), 'index']);
    $route->get('/attribute-restore/{id}', [new AttributeController(), 'restore']);
    $route->post('/attribute-restore/{id}', [new AttributeController(), 'restore']);
    $route->get('/attribute-create', [new AttributeController(), 'store']);
    $route->post('/attribute-create', [new AttributeController(), 'store']);
    $route->get('/attribute-update/{id}', [new AttributeController(), 'update']);
    $route->post('/attribute-update/{id}', [new AttributeController(), 'update']);
    $route->post('/attribute-destroy/{id}', [new AttributeController(), 'destroy']);
    $route->post('/attribute-delete/{id}', [new AttributeController(), 'delete']);

    $route->get('/category/{id}', [new CategoryController(), 'index']);
    $route->get('/category-restore/{id}', [new CategoryController(), 'restore']);
    $route->post('/category-restore/{id}', [new CategoryController(), 'restore']);
    $route->get('/category-create', [new CategoryController(), 'store']);
    $route->post('/category-create', [new CategoryController(), 'store']);
    $route->get('/category-update/{id}', [new CategoryController(), 'update']);
    $route->post('/category-update/{id}', [new CategoryController(), 'update']);
    $route->post('/category-destroy/{id}', [new CategoryController(), 'destroy']);
    $route->post('/category-delete/{id}', [new CategoryController(), 'delete']);

    $route->get('/post/{id}', [new PostController(), 'index']);
    $route->get('/post-restore/{id}', [new PostController(), 'restore']);
    $route->post('/post-restore/{id}', [new PostController(), 'restore']);
    $route->get('/post-create', [new PostController(), 'store']);
    $route->post('/post-create', [new PostController(), 'store']);
    $route->get('/post-update/{id}', [new PostController(), 'update']);
    $route->post('/post-update/{id}', [new PostController(), 'update']);
    $route->post('/post-destroy/{id}', [new PostController(), 'destroy']);
    $route->post('/post-delete/{id}', [new PostController(), 'delete']);


    $route->get('/order', [new OrderController(), 'index']);
});

$app->router->get('/', [new HomeController(), 'index']);
$app->router->get('/shop', [new ShopController(), 'index']);
$app->router->get('/blog', [new BlogController(), 'index']);
$app->router->get('/blog-detail/{id}', [new BlogController(), 'show']);
$app->router->get('/about', [new AboutController(), 'index']);
$app->router->get('/contact', [new ContactController(), 'index']);
$app->router->get('/cart', [new CartController(), 'index']);
$app->router->post('/cart', [new CartController(), 'index']);
$app->router->post('/cart/{id}', [new CartController(), 'store']);
$app->router->get('/shop/{slug}', [new ShopController(), 'show']);
$app->router->post('/shop/{slug}', [new ShopController(), 'store']);

$app->router->get('/login', [new AuthController(), 'login']);
$app->router->post('/login', [new AuthController(), 'login']);
$app->router->get('/register', [new AuthController(), 'register']);
$app->router->post('/register', [new AuthController(), 'register']);

$app->run();
