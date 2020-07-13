<?php

use Modules\Product\Models\Brand;
use Phinx\Seed\AbstractSeed;

class BrandTableSeeder extends AbstractSeed
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
        $brands = $this->getBrands();
        $data = [];
        foreach ($brands as $brand) {
            $data[] = [
                'name' => $brand,
            ];
        }

        $this->table(Brand::TABLE_NAME)->insert($data)->save();
    }

    private function getBrands()
    {
        return [
            0 => 'LG',
            1 => 'Samsung',
            2 => 'Sharp',
            3 => 'Sony',
            4 => 'Pioneer',
        ];
    }
}
