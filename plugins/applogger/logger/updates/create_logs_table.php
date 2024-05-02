<?php namespace AppLogger\Logger\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateLogsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('applogger_logger_logs', function(Blueprint $table) {
            // REVIEW: Tu by som to možno len trochu logicky rozdelil medzerami, napr. ID je také univerzálne, ďalej máš 3 svoje custom fields a na konci october timestamps
            $table->increments('id');
            $table->dateTime('arrival_time');
            $table->string('name');
            $table->boolean('delay');
            $table->timestamps();

        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('applogger_logger_logs');
    }
};
