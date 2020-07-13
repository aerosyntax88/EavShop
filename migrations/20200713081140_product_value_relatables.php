<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ProductValueRelatables as ProductValueRelatablesModel;

class ProductValueRelatables extends Migration
{
    public function up()
    {
        $this->schema->create(ProductValueRelatablesModel::TABLE_NAME, function (Blueprint $table) {
            $table->integer('product_value_relation_id');
            $table->integer('relatable_id');
            $table->string('relatable_type');
        });
    }

    public function down()
    {
        $this->schema->drop(ProductValueRelatablesModel::TABLE_NAME);
    }
}