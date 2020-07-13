<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\Brand as BrandModel;

class Brand extends Migration
{
    public function up()
    {
        $this->schema->create(BrandModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });
    }

    public function down()
    {
        $this->schema->drop(BrandModel::TABLE_NAME);
    }
}