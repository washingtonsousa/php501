<?php

require __DIR__ . '/../vendor/autoload.php';

use Dexter\Router\FrontController;
use Dexter\Router\Router;
use Dexter\Router\Dispatcher;
use Dexter\Router\Request;
use Dexter\Router\Response;
use Dexter\Router\DefaultFrontRoute;
use Dexter\Router\DefaultAdminRoute;
use Dexter\Db\Conn;

$env = (getenv('APP_ENV')) ? getenv('APP_ENV') : 'live';
define('APP_ENV', $env);

Conn::setConfig(parse_ini_file(__DIR__ . "/../application/configs/{$env}.ini", true));

$router = (new Router())
    ->addRoute(new DefaultFrontRoute())
    ->addRoute(new DefaultAdminRoute());

# inicia front controller
$frontController = new FrontController(
    $router,
    new Dispatcher()
);

# roda front controller
try {
    $frontController->run(
        new Request(),
        new Response()
    );
} catch (Exception $e) {
    header('Location: /?q=erro.html');
}
