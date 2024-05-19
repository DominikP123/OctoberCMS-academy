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

            $table->id('id');
            // REVIEW Keď dáš $table->id('id') je to to isté ako $table->id()

            /* REVIEW $table->id() vytvorí auto-incrementing column, čo nesedí keďže tento column má iba ukazovať na user záznam...
            Toto zmeň na základe toho čo sme sa bavili, čiže použi ->foreignIdFor() */
            $table->id('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('appuser_user_users')->onDelete('cascade');

            $table->dateTime('arrival_time');
            // REVIEW radšej použí timestamp namiesto dateTime
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
