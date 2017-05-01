<?php

namespace App\Migration;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

/**
 * Class Migration
 *
 * @package App\Migration
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
class Migration extends AbstractMigration
{
    /**
     * @var Manager
     */
    public $capsule;

    /**
     * @var Builder
     */
    public $schema;

    /**
     * @return void
     */
    public function init()
    {
        $this->capsule = new Manager;
        $config = require(__DIR__.'/../settings.php');
        $this->capsule->addConnection($config['settings']['db']);

        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        $this->schema = $this->capsule->schema();
    }

}