<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\DisplayError;
use app\core\Debug;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$error = new DisplayError();
$error->setErrorHandler();

require_once __DIR__ . '/../routes/web.php';
