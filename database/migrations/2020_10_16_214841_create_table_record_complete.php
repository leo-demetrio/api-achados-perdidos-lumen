<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRecordComplete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_complete', function (Blueprint $table) {
            $table->bigIncrements('id_rc');//ou id puro
            $table->unsignedBigInteger('record_id');
            $table->string('name');
            $table->string('tel')->nullable();
            $table->string('tel_rec')->nullable();
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
        Schema::dropIfExists('record_complete');
    }
}
