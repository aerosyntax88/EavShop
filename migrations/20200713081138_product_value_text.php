<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ProductValueText as ProductValueTextModel;

class ProductValueText extends Migration
{
    public function up()
    {
        $this->schema->create(ProductValueTextModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id');
            $table->integer('attribute_id');
            $table->text('value');
        });
    }

    public function down()
    {
        $this->schema->drop(ProductValueTextModel::TABLE_NAME);
    }
}