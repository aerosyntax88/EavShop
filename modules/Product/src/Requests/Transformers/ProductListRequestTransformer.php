<?php

namespace Modules\Product\Requests\Transformers;

use Modules\Boundary\Contracts\RequestModelInterface;
use Modules\Boundary\Request\Transformers\AbstractRequestTransformer;
use Modules\Product\Requests\Models\ProductListRequestModel;

class ProductListRequestTransformer extends AbstractRequestTransformer
{
    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $limit;

    /**
     * @var int
     */
    protected $brand;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $minPrice;

    /**
     * @var int
     */
    protected $maxPrice;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page ?? ProductListRequestModel::DEFAULT_PAGE;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit ?? ProductListRequestModel::DEFAULT_LIMIT;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getBrand(): int
    {
        return $this->brand ?? ProductListRequestModel::DEFAULT_BRAND;
    }

    /**
     * @param int $brand
     * @return ProductListRequestTransformer
     */
    public function setBrand(int $brand): ProductListRequestTransformer
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size ?? ProductListRequestModel::DEFAULT_SIZE;
    }

    /**
     * @param int $size
     * @return ProductListRequestTransformer
     */
    public function setSize(int $size): ProductListRequestTransformer
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description ?? ProductListRequestModel::DEFAULT_DESCRIPTION;
    }

    /**
     * @param string $description
     * @return ProductListRequestTransformer
     */
    public function setDescription(string $description): ProductListRequestTransformer
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinPrice(): int
    {
        return $this->minPrice ?? ProductListRequestModel::DEFAULT_MIN_PRICE;
    }

    /**
     * @param int $minPrice
     * @return ProductListRequestTransformer
     */
    public function setMinPrice(int $minPrice): ProductListRequestTransformer
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->maxPrice ?? ProductListRequestModel::DEFAULT_MAX_PRICE;
    }

    /**
     * @param int $maxPrice
     * @return ProductListRequestTransformer
     */
    public function setMaxPrice(int $maxPrice): ProductListRequestTransformer
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return RequestModelInterface
     */
    public function build(): RequestModelInterface
    {
        return new ProductListRequestModel($this);
    }
}
