<?php

use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Modules\Product\Models\ProductValueRelatables;
use Modules\Product\Models\ProductValueRelation;
use Phinx\Seed\AbstractSeed;
use Modules\Product\Models\ResolutionHeight;

class ResolutionHeightValueRelationTableSeeder extends AbstractSeed
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
        $this->seedRelation();
        $this->seedRelatable();
    }

    private function seedRelation()
    {
        $productData = $this->adapter->fetchAll('SELECT id FROM product');
        $relationData = [];
        foreach ($productData as $relation) {
            $relationData[] = [
                'model_id' => $relation['id'],
                'attribute_id' => ProductAttributeModel::ATTRIBUTE_RESOLUTION_HEIGHT,
            ];
        }

        $this->table(ProductValueRelation::TABLE_NAME)->insert($relationData)->save();
    }

    private function seedRelatable(): void
    {
        $relationData = $this->getResolutionHeightRelations();
        $resolutionHeightData = $this->getResolutionHeightData();

        $pivotData = [];
        foreach ($relationData as $relation) {
            $pivotData[] = [
                'product_value_relation_id' => $relation['id'],
                'relatable_id' => $resolutionHeightData[array_rand($resolutionHeightData)],
                'relatable_type' => ResolutionHeight::class,
            ];
        }
        $this->table(ProductValueRelatables::TABLE_NAME)->insert($pivotData)->save();
    }

    /**
     * @return array
     */
    private function getResolutionHeightRelations(): array
    {
        return $this->adapter->fetchAll(
            'SELECT id 
                FROM product_value_relation 
                WHERE attribute_id = ' . ProductAttributeModel::ATTRIBUTE_RESOLUTION_HEIGHT
        );
    }

    /**
     * @return array
     */
    private function getResolutionHeightData(): array
    {
        $resolutionHeightData = $this->adapter->fetchAll('SELECT id FROM resolution_height');
        return array_column($resolutionHeightData, 'id');
    }
}
