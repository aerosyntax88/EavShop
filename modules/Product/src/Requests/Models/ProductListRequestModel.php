<?php

namespace Modules\Product\Requests\Models;

use Modules\Boundary\Request\Models\AbstractRequestModel;
use Modules\Product\Requests\Transformers\ProductListRequestTransformer;

class ProductListRequestModel extends AbstractRequestModel
{
    const DEFAULT_PAGE = 1;
    const DEFAULT_LIMIT = 10;
    const DEFAULT_BRAND = 0;
    const DEFAULT_SIZE = 0;
    const DEFAULT_DESCRIPTION = '';
    const DEFAULT_MIN_PRICE = 0;
    const DEFAULT_MAX_PRICE = PHP_INT_MAX;

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
     * @param ProductListRequestTransformer $transformer
     */
    public function __construct(ProductListRequestTransformer $transformer)
    {
        $this->page = $transformer->getPage();
        $this->limit = $transformer->getLimit();
        $this->brand = $transformer->getBrand();
        $this->size = $transformer->getSize();
        $this->description = $transformer->getDescription();
        $this->minPrice = $transformer->getMinPrice();
        $this->maxPrice = $transformer->getMaxPrice();
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getBrand(): int
    {
        return $this->brand;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getMinPrice(): int
    {
        return $this->minPrice;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->maxPrice;
    }
}
