<?php

use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Modules\Product\Models\ProductValueRelatables;
use Modules\Product\Models\ProductValueRelation;
use Phinx\Seed\AbstractSeed;
use Modules\Product\Models\ResolutionWidth;

class ResolutionWidthValueRelationTableSeeder extends AbstractSeed
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
                'attribute_id' => ProductAttributeModel::ATTRIBUTE_RESOLUTION_WIDTH,
            ];
        }

        $this->table(ProductValueRelation::TABLE_NAME)->insert($relationData)->save();
    }

    private function seedRelatable(): void
    {
        $relationData = $this->getResolutionWidthRelations();
        $resolutionWidthData = $this->getResolutionWidthData();

        $pivotData = [];
        foreach ($relationData as $relation) {
            $pivotData[] = [
                'product_value_relation_id' => $relation['id'],
                'relatable_id' => $resolutionWidthData[array_rand($resolutionWidthData)],
                'relatable_type' => ResolutionWidth::class,
            ];
        }
        $this->table(ProductValueRelatables::TABLE_NAME)->insert($pivotData)->save();
    }

    /**
     * @return array
     */
    private function getResolutionWidthRelations(): array
    {
        return $this->adapter->fetchAll(
            'SELECT id 
                FROM product_value_relation 
                WHERE attribute_id = ' . ProductAttributeModel::ATTRIBUTE_RESOLUTION_WIDTH
        );
    }

    /**
     * @return array
     */
    private function getResolutionWidthData(): array
    {
        $resolutionWidthData = $this->adapter->fetchAll('SELECT id FROM resolution_width');
        return array_column($resolutionWidthData, 'id');
    }
}
