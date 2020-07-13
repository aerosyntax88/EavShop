<?php

namespace Modules\Product\Http\Controllers;

use Jenssegers\Blade\Blade;
use Modules\Product\Contracts\ProductListServiceInterface;
use Modules\Product\Models\Brand;
use Modules\Product\Models\DisplaySize;
use Modules\Product\Requests\Transformers\ProductListRequestTransformer;
use RequestInterface;

class ProductListController
{
    /**
     * @var ProductListServiceInterface
     */
    protected $listService;

    /**
     * @var ProductListRequestTransformer
     */
    protected $requestTransformer;

    /**
     * @param ProductListServiceInterface $listService
     * @param ProductListRequestTransformer $requestTransformer
     */
    public function __construct(
        ProductListServiceInterface $listService,
        ProductListRequestTransformer $requestTransformer
    )
    {
        $this->listService = $listService;
        $this->requestTransformer = $requestTransformer;
    }

    /**
     * @param RequestInterface $request
     * @return string
     */
    public function __invoke(RequestInterface $request): string
    {
        $requestModel = $this->requestTransformer->httpTransform($request)->build();
        $products = $this->listService->list($requestModel);
        $blade = new Blade(__DIR__ . '/../../Views/', 'cache');
        return $blade->render('product_table', [
            'brands' => Brand::all(),
            'sizes' => DisplaySize::all(),
            'products' => $products,
            'parameters' => $requestModel,
        ]);
    }
}
