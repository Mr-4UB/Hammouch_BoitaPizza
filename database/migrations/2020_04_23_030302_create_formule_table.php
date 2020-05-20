<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomFormule')->unique();
            $table->float('prix');
            $table->text('description');
            $table->text('imgPath');
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
        Schema::dropIfExists('formule');
    }
}
