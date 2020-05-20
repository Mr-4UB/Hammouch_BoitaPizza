<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_pub');
            $table->text('texte');
            $table->unsignedInteger('codeProduit');
            $table->unsignedInteger('numClient');
            $table->foreign('codeProduit')->references('id')->on('Produits')->onDelete('cascade');
            $table->foreign('numClient')->references('id')->on('client')->onDelete('cascade');
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
        Schema::dropIfExists('commentaire');
    }
}
