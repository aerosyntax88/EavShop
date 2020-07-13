<?php

use Faker\Factory as Faker;
use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Modules\Product\Models\ProductValueText;
use Phinx\Seed\AbstractSeed;

class DescriptionValueTextTableSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'DatabaseTruncator',
            'ProductTableSeeder',
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productData = $this->adapter->fetchAll('SELECT id FROM product');
        $faker = Faker::create();
        $data = [];
        foreach ($productData as $product) {
            $data[] = [
                'model_id' => $product['id'],
                'attribute_id' => ProductAttributeModel::ATTRIBUTE_DESCRIPTION,
                'value' => $faker->sentence(10),
            ];
        }

        $this->table(ProductValueText::TABLE_NAME)->insert($data)->save();
    }
}
