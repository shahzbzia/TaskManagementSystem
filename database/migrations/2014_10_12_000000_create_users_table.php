<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('countryCode');
            $table->integer('number')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('isStudent');
            $table->string('image');
            $table->string('coverImage');
            $table->foreignId('theme_id');
            $table->foreignId('highcolors_id');
            $table->foreignId('mediumcolors_id');
            $table->foreignId('lowcolors_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
