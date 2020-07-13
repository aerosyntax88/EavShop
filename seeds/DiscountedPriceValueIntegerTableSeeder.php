<?php

use Faker\Factory as Faker;
use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Modules\Product\Models\ProductValueInteger;
use Phinx\Seed\AbstractSeed;

class DiscountedPriceValueIntegerTableSeeder extends AbstractSeed
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
        $productData = $this->adapter->fetchAll('SELECT id, price FROM product');
        $faker = Faker::create();
        $data = [];
        foreach ($productData as $product) {
            $data[] = [
                'model_id' => $product['id'],
                'attribute_id' => ProductAttributeModel::ATTRIBUTE_DISCOUNTED_PRICE,
                'value' => $faker->numberBetween(5000, $product['price']),
            ];
        }

        $this->table(ProductValueInteger::TABLE_NAME)->insert($data)->save();
    }
}
