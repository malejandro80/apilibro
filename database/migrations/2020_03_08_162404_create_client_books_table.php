<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_idClient');
            $table->unsignedBigInteger('fk_idBook');
            $table->string('status');
            $table->integer('cant');
            $table->timestamps();

            
            $table->foreign('fk_idClient')->references('id')->on('clients');
            $table->foreign('fk_idBook')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_books');
    }
}
