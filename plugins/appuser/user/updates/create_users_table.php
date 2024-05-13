<?php namespace AppUser\User\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

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
            /* REVIEW - Čo viem tak existujú 3 spôsoby ako sa dá vytvoriť ID column:
            1. $table->id();
            2. $table->increments('id');
            3. $table->integer('id', true);
            Vo väčšine prípadov ide pri rozhodovaní medzi týmito len o preferenciu, ale môžu nastať problémy ako napr. tento ktorý nastal mne keď som si chcel zmigrovať DB.
            Pokúsil som sa zbehnúť "php artisan october:migrate" a dostal som error že foreign key v "create_logs_table.php" je nesprávne zadaný.
            To je vlastne foreign na toto User ID, a v tomto errore išlo o to že foreign a samotné ID neboli toho istého typu.
            foreign bol "integer" ($table->integer('user_id')->nullable()) a toto id je typu "increments", čo je vlastne "bigInteger" a tým pádom s tým má DB problém.
            Podobný problém nastane ak použiješ $table->id();, tiež je to "bigInteger".
            Tretí spôsob sa nepoužíva moc, lebo pre ID je lepšie mať bigInteger ako iba integer.
            Takže odporúčam ti používať prvý spôsob (ten sa najviac používa), a oprav foreign tak že zmeníš typ z integer na bigInteger
            */
            $table->increments('id');

            $table->string('username')->unique();
            $table->string('password');
            $table->string('token')->nullable();
            $table->boolean('delay');
            $table->dateTime('login_time');

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
