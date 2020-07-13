<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\Product as ProductModel;

class Product extends Migration
{
    public function up()
    {
        $this->schema->create(ProductModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->drop(ProductModel::TABLE_NAME);
    }
}