<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nom');
            $table->float('Prix');
            $table->unsignedInteger('catID');
            $table->integer('Remise');
            $table->dateTime('Date_debut');
            $table->dateTime('Date_fin');
            $table->boolean('isPromo');
            $table->text('imgPath');
            $table->foreign('catID')->references('id')->on('CatProduit')->onDelete('cascade');
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
        Schema::dropIfExists('Produits');
    }
}
