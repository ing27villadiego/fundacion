<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGodfathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('godfathers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_membership');
            $table->string('code_godfather');
            $table->integer('promoter_id')->unsigned();
            $table->integer('adviser_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('document_id')->unsigned();
            $table->string('document');
            $table->date('date_birthday');
            $table->string('email');
            $table->string('address_office');
            $table->string('district_office');
            $table->string('phone_office');
            $table->string('cell_phone_office');
            $table->string('whatsapp');
            $table->string('profesion');
            $table->string('charge');
            $table->string('business');
            $table->string('address_house');
            $table->string('district_house');
            $table->string('phone_house');
            $table->integer('city_id')->unsigned();
            $table->integer('godchildren_id')->unsigned();
            $table->string('community');
            $table->integer('paymenttype_id')->unsigned();
            $table->integer('paymentperiod_id')->unsigned();
            $table->integer('type_godfather');
            $table->decimal('value_donation');
            $table->string('day_colletion');

            $table->integer('state')->default(1);

            $table->foreign('promoter_id')
                ->references('id')->on('employees')
                ->onDelete('cascade');
            $table->foreign('adviser_id')
                ->references('id')->on('employees')
                ->onDelete('cascade');
            $table->foreign('document_id')
                ->references('id')->on('documents')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->foreign('godchildren_id')
                ->references('id')->on('godchildrens')
                ->onDelete('cascade');
            $table->foreign('paymenttype_id')
                ->references('id')->on('paymenttypes')
                ->onDelete('cascade');
            $table->foreign('paymentperiod_id')
                ->references('id')->on('paymentperiods')
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
        Schema::dropIfExists('godfathers');
    }
}
