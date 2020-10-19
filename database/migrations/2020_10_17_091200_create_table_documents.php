<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('id_doc');//primaryKey
            $table->integer('record_id');
            $table->string('number_doc')->unique();
            $table->string('type_doc');
            $table->date('date_loss')->nullable();
            $table->string('name_doc');
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
        Schema::dropIfExists('documents');
    }
}
