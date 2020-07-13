<?php

use Faker\Factory as Faker;
use Modules\Product\Models\Product;
use Phinx\Seed\AbstractSeed;

class ProductTableSeeder extends AbstractSeed
{

    public function getDependencies()
    {
        return [
            'DatabaseTruncator',
            'BrandTableSeeder',
            'DisplaySizeTableSeeder',
            'ResolutionWidthTableSeeder',
            'ResolutionHeightTableSeeder',
            'ProductAttributeTableSeeder',
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name' => $faker->word,
                'price' => $faker->numberBetween(10000, 1000000),
                'created_at' => $faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
            ];
        }

        $this->table(Product::TABLE_NAME)->insert($data)->save();
    }
}
