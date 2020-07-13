<?php

use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Phinx\Seed\AbstractSeed;

class ProductAttributeTableSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'DatabaseTruncator',
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = $this->getAttributes();
        $data = [];
        foreach ($attributes as $attribute) {
            $data[] = $attribute;
        }

        $this->table(ProductAttributeModel::TABLE_NAME)->insert($data)->save();
    }

    private function getAttributes()
    {
        return [
            ProductAttributeModel::ATTRIBUTE_SIZE => [
                ProductAttributeModel::FIELD_LABEL => 'size',
                ProductAttributeModel::FIELD_DISPLAY_NAME => 'Size',
            ],
            ProductAttributeModel::ATTRIBUTE_RESOLUTION_WIDTH => [
                ProductAttributeModel::FIELD_LABEL => 'resolution_width',
                ProductAttributeModel::FIELD_DISPLAY_NAME => 'Resolution width',
            ],
            ProductAttributeModel::ATTRIBUTE_RESOLUTION_HEIGHT => [
                ProductAttributeModel::FIELD_LABEL => 'resolution_height',
                ProductAttributeModel::FIELD_DISPLAY_NAME => 'Resolution height',
            ],
            ProductAttributeModel::ATTRIBUTE_BRAND => [
                ProductAttributeModel::FIELD_LABEL => 'brand',
                ProductAttributeModel::FIELD_DISPLAY_NAME => 'Brand',
            ],
            ProductAttributeModel::ATTRIBUTE_DISCOUNTED_PRICE => [
                ProductAttributeModel::FIELD_LABEL => 'discounted_price',
                ProductAttributeModel::FIELD_DISPLAY_NAME => 'Discounted price',
            ],
            ProductAttributeModel::ATTRIBUTE_DESCRIPTION => [
                ProductAttributeModel::FIELD_LABEL => 'description',
                ProductAttributeModel::FIELD_DISPLAY_NAME => 'Description',
            ],
        ];
    }
}
