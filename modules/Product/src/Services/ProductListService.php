<?php

namespace Modules\Product\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Product\Contracts\ProductListServiceInterface;
use Modules\Product\Contracts\ProductRepositoryInterface;
use Modules\Product\Requests\Models\ProductListRequestModel;

class ProductListService implements ProductListServiceInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $repository;

    /**
     * @param ProductRepositoryInterface $repository
     */
    public function __construct(
        ProductRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function list(ProductListRequestModel $requestModel): Paginator
    {
        return $this->repository->list($requestModel);
    }
}
