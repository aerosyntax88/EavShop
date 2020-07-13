<?php

use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Modules\Product\Models\ProductValueRelatables;
use Modules\Product\Models\ProductValueRelation;
use Phinx\Seed\AbstractSeed;
use Modules\Product\Models\DisplaySize;

class SizeValueRelationTableSeeder extends AbstractSeed
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
                'attribute_id' => ProductAttributeModel::ATTRIBUTE_SIZE,
            ];
        }

        $this->table(ProductValueRelation::TABLE_NAME)->insert($relationData)->save();
    }

    private function seedRelatable(): void
    {
        $relationData = $this->getSizeRelations();
        $sizeData = $this->getSizeData();

        $pivotData = [];
        foreach ($relationData as $relation) {
            $pivotData[] = [
                'product_value_relation_id' => $relation['id'],
                'relatable_id' => $sizeData[array_rand($sizeData)],
                'relatable_type' => DisplaySize::class,
            ];
        }
        $this->table(ProductValueRelatables::TABLE_NAME)->insert($pivotData)->save();
    }

    /**
     * @return array
     */
    private function getSizeRelations(): array
    {
        return $this->adapter->fetchAll(
            'SELECT id 
                FROM product_value_relation 
                WHERE attribute_id = ' . ProductAttributeModel::ATTRIBUTE_SIZE
        );
    }

    /**
     * @return array
     */
    private function getSizeData(): array
    {
        $sizeData = $this->adapter->fetchAll('SELECT id FROM display_size');
        return array_column($sizeData, 'id');
    }
}
