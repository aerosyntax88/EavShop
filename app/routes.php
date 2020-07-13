<?php

use Modules\Product\Http\Controllers\ProductListController;

include_once '../router/Request.php';
include_once '../router/Router.php';
$router = new Router(new Request);

$router->get('/', function (RequestInterface $request) use ($container) {
    echo $container->call(ProductListController::class, [$request]);
});
