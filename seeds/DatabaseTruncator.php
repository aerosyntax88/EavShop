<?php

use Modules\Product\Models\Brand;
use Modules\Product\Models\DisplaySize;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductAttribute;
use Modules\Product\Models\ProductValueInteger;
use Modules\Product\Models\ProductValueRelatables;
use Modules\Product\Models\ProductValueRelation;
use Modules\Product\Models\ProductValueText;
use Modules\Product\Models\ResolutionHeight;
use Modules\Product\Models\ResolutionWidth;
use Phinx\Seed\AbstractSeed;

class DatabaseTruncator extends AbstractSeed
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->table(ProductValueRelatables::TABLE_NAME)->truncate();
        $this->table(ProductValueRelation::TABLE_NAME)->truncate();
        $this->table(ProductValueInteger::TABLE_NAME)->truncate();
        $this->table(ProductValueText::TABLE_NAME)->truncate();
        $this->table(DisplaySize::TABLE_NAME)->truncate();
        $this->table(Brand::TABLE_NAME)->truncate();
        $this->table(ResolutionHeight::TABLE_NAME)->truncate();
        $this->table(ResolutionWidth::TABLE_NAME)->truncate();
        $this->table(ProductAttribute::TABLE_NAME)->truncate();
        $this->table(Product::TABLE_NAME)->truncate();
    }
}
