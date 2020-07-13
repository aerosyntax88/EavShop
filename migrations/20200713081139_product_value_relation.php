<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ProductValueRelation as ProductValueRelationModel;

class ProductValueRelation extends Migration
{
    public function up()
    {
        $this->schema->create(ProductValueRelationModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id');
            $table->integer('attribute_id');
        });
    }

    public function down()
    {
        $this->schema->drop(ProductValueRelationModel::TABLE_NAME);
    }
}