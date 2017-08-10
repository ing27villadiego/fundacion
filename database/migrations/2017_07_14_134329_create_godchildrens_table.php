<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGodchildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('godchildrens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('document_id')->unsigned();
            $table->string('document');
            $table->date('birth_date');
            $table->integer('datafamily_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('state')->default(1);

            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->foreign('datafamily_id')
                ->references('id')->on('datafamilies')
                ->onDelete('cascade');
            $table->foreign('document_id')
                ->references('id')->on('documents')
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
        Schema::dropIfExists('godchildrens');
    }
}
