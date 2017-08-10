<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatafamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datafamilies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('document_id')->unsigned();
            $table->string('document');
            $table->integer('city_id')->unsigned();
            $table->string('address');
            $table->string('cell_phone');
            $table->date('date_birthday');
            $table->string('number_brothers');
            $table->string('name_brothers');

            $table->integer('state')->default(1);

            $table->foreign('document_id')
                ->references('id')->on('documents')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');

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
        Schema::dropIfExists('datafamilies');
    }
}
