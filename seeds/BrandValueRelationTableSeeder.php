<?php

use Modules\Product\Models\ProductAttribute as ProductAttributeModel;
use Modules\Product\Models\ProductValueRelatables;
use Modules\Product\Models\ProductValueRelation;
use Phinx\Seed\AbstractSeed;
use Modules\Product\Models\Brand;

class BrandValueRelationTableSeeder extends AbstractSeed
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
                'attribute_id' => ProductAttributeModel::ATTRIBUTE_BRAND,
            ];
        }

        $this->table(ProductValueRelation::TABLE_NAME)->insert($relationData)->save();
    }

    private function seedRelatable(): void
    {
        $relationData = $this->getBrandRelations();
        $brandData = $this->getBrandData();

        $pivotData = [];
        foreach ($relationData as $relation) {
            $pivotData[] = [
                'product_value_relation_id' => $relation['id'],
                'relatable_id' => $brandData[array_rand($brandData)],
                'relatable_type' => Brand::class,
            ];
        }
        $this->table(ProductValueRelatables::TABLE_NAME)->insert($pivotData)->save();
    }

    /**
     * @return array
     */
    private function getBrandRelations(): array
    {
        return $this->adapter->fetchAll(
            'SELECT id 
                FROM product_value_relation 
                WHERE attribute_id = ' . ProductAttributeModel::ATTRIBUTE_BRAND
        );
    }

    /**
     * @return array
     */
    private function getBrandData(): array
    {
        $brandData = $this->adapter->fetchAll('SELECT id FROM brand');
        return array_column($brandData, 'id');
    }
}
