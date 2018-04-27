<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('straat');
            $table->integer('huisnummer');
            $table->string('postcode');
            $table->string('woonplaats');
            $table->string('telefoon');
            $table->string('rekeningnummer');
            $table->string('identificatie');
            $table->integer('korting');
            $table->text('opmerking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
