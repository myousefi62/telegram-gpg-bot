<?php

use \App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class PublicKeysMigration
 *
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
class PublicKeysMigration extends Migration
{
    public function up()
    {
        $this->schema->create('public_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->longText('public_key');
            $table->timestamps();
        });
    }
}
