<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ProductValueInteger as ProductValueIntegerModel;

class ProductValueInteger extends Migration
{
    public function up()
    {
        $this->schema->create(ProductValueIntegerModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id');
            $table->integer('attribute_id');
            $table->integer('value');
        });
    }

    public function down()
    {
        $this->schema->drop(ProductValueIntegerModel::TABLE_NAME);
    }
}