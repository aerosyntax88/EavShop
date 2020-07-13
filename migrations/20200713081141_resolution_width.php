<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ResolutionWidth as ResolutionWidthModel;

class ResolutionWidth extends Migration
{
    public function up()
    {
        $this->schema->create(ResolutionWidthModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value')->unique();
        });
    }

    public function down()
    {
        $this->schema->drop(ResolutionWidthModel::TABLE_NAME);
    }
}