<?php
declare(strict_types=1);

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Product\Models\ResolutionHeight as ResolutionHeightModel;

class ResolutionHeight extends Migration
{
    public function up()
    {
        $this->schema->create(ResolutionHeightModel::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value')->unique();
        });
    }

    public function down()
    {
        $this->schema->drop(ResolutionHeightModel::TABLE_NAME);
    }
}