<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\DisplaySize as DisplaySizeModel;

class DisplaySize extends Migration
{
    public function up()
    {
        $this->schema->create(DisplaySizeModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('size')->unique();
        });
    }

    public function down()
    {
        $this->schema->drop(DisplaySizeModel::TABLE_NAME);
    }
}