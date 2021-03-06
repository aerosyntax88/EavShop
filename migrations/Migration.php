<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration
{
    /**
     * @var Capsule $capsule
     */
    public $capsule;
    /**
     * @var Builder $capsule
     */
    public $schema;

    public function init()
    {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'shop_db_1',
            'database' => 'shop',
            'username' => 'user',
            'password' => 'secret',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }
}