<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ProductAttribute as ProductAttributeModel;

class ProductAttribute extends Migration
{
    public function up()
    {
        $this->schema->create(ProductAttributeModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
            $table->string('display_name');
        });
    }

    public function down()
    {
        $this->schema->drop(ProductAttributeModel::TABLE_NAME);
    }
}