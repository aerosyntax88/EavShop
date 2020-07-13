<?php

namespace Modules\Product\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Modules\Product\Contracts\ProductRepositoryInterface;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductAttribute;
use Modules\Product\Requests\Models\ProductListRequestModel;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $query;

    /**
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function list(ProductListRequestModel $requestModel): Paginator
    {
        $this->query = $this->model->newQuery();
        $this->handleBrandFilter($requestModel);
        $this->handleDescriptionFilter($requestModel);
        $this->handleDiscountPriceFilter($requestModel);
        $this->handleSizeFilter($requestModel);
        return $this->query->paginate($requestModel->getLimit(), ['*'], 'page', $requestModel->getPage());
    }

    private function handleBrandFilter($requestModel): Builder
    {
        if ($requestModel->getBrand() == 0) {
            return $this->query;
        }

        return $this->query->whereHas('relationValues', function ($q) use ($requestModel) {
            $q->where('attribute_id', '=', ProductAttribute::ATTRIBUTE_BRAND);
            $q->whereHas('brands', function ($q) use ($requestModel) {
                $q->where('id', '=', $requestModel->getBrand());
            });
        });
    }

    private function handleDescriptionFilter($requestModel): Builder
    {
        if ($requestModel->getDescription() == '') {
            return $this->query;
        }

        return $this->query->whereHas('textValues', function ($q) use ($requestModel) {
            $q->where('attribute_id', '=', ProductAttribute::ATTRIBUTE_DESCRIPTION);
            $q->where('value', 'like', '%' . $requestModel->getDescription() . '%');
        });
    }

    private function handleDiscountPriceFilter($requestModel): Builder
    {
        if ($requestModel->getMinPrice() == 0 && $requestModel->getMaxPrice() == PHP_INT_MAX) {
            return $this->query;
        }

        return $this->query->whereHas('integerValues', function ($q) use ($requestModel) {
            $q->where('attribute_id', '=', ProductAttribute::ATTRIBUTE_DISCOUNTED_PRICE);
            $q->where('value', '>=', $requestModel->getMinPrice());
            $q->where('value', '<=', $requestModel->getMaxPrice());
        });
    }

    private function handleSizeFilter($requestModel): Builder
    {
        if ($requestModel->getSize() == 0) {
            return $this->query;
        }

        return $this->query->whereHas('relationValues', function ($q) use ($requestModel) {
            $q->where('attribute_id', '=', ProductAttribute::ATTRIBUTE_SIZE);
            $q->whereHas('sizes', function ($q) use ($requestModel) {
                $q->where('id', '=', $requestModel->getSize());
            });
        });
    }
}
