<?php

use Modules\Product\Models\ResolutionHeight;
use Phinx\Seed\AbstractSeed;

class ResolutionHeightTableSeeder extends AbstractSeed
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

        $this->table(ResolutionHeight::TABLE_NAME)->insert($data)->save();
    }

    private function getResolutions()
    {
        return [
            480,
            576,
            720,
            1080,
            2160,
            4320,
        ];
    }
}
