<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVeicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veicles', function (Blueprint $table) {
            $table->id('id_vei');
            $table->unsignedBigInteger('record_id');
            $table->string('board')->unique();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->date('date_occurrence')->nullable();
            $table->string('name_owner')->nullable();
            $table->string('situation');
            $table->timestamps();

            $table->foreign('record_id')->references('id_record')->on('records');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veicles');
    }
}
