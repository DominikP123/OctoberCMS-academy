<?php namespace AppUser\User\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Illuminate\Support\Facades\DB;

/**
 * CreateUsersTable Migration
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
        Schema::create('appuser_user_users', function(Blueprint $table) {

            $table->id();

            $table->string('username')->unique();
            $table->string('password');
            $table->string('token')->nullable();
            $table->boolean('delay');
            $table->dateTime('login_time')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();
            
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('appuser_user_users');
    }
};
