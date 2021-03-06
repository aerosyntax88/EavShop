<?php

namespace Modules\Product\Contracts;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Product\Requests\Models\ProductListRequestModel;

interface ProductRepositoryInterface
{
    /**
     * @param ProductListRequestModel $requestModel
     * @return Paginator
     */
    public function list(ProductListRequestModel $requestModel): Paginator;
}
