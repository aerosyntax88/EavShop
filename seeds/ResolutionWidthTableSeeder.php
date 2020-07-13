<?php

use Modules\Product\Models\ResolutionWidth;
use Phinx\Seed\AbstractSeed;

class ResolutionWidthTableSeeder extends AbstractSeed
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
        $resolutions = $this->getResolutions();
        $data = [];
        foreach ($resolutions as $resolution) {
            $data[] = [
                'value' => $resolution,
            ];
        }

        $this->table(ResolutionWidth::TABLE_NAME)->insert($data)->save();
    }

    private function getResolutions()
    {
        return [
            720,
            1280,
            1920,
            3840,
            4096,
            7680,
        ];
    }
}
