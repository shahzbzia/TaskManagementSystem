<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_dos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->time('end_time', 0)->nullable();
            $table->date('date_reminder')->nullable();
            $table->time('time_reminder', 0)->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->integer('priorities_id')->default(3);
            $table->integer('users_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_dos');
    }
}
