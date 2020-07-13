<?php

use Modules\Product\Models\DisplaySize;
use Phinx\Seed\AbstractSeed;

class DisplaySizeTableSeeder extends AbstractSeed
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
        $sizes = $this->getSizes();
        $data = [];
        foreach ($sizes as $size) {
            $data[] = [
                'size' => $size,
            ];
        }

        $this->table(DisplaySize::TABLE_NAME)->insert($data)->save();
    }

    private function getSizes()
    {
        return [
            17,
            19,
            21,
            23,
            27,
            31,
            33,
        ];
    }
}
