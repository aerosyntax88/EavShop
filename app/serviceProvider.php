<?php

use DI\ContainerBuilder;
use Modules\Product\Contracts\ProductListServiceInterface;
use Modules\Product\Contracts\ProductRepositoryInterface;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Services\ProductListService;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->useAutowiring(true);
    $containerBuilder->addDefinitions([
        ProductListServiceInterface::class => DI\get(ProductListService::class),
        ProductRepositoryInterface::class => DI\get(ProductRepository::class),
    ]);
};
