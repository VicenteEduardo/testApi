<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubindicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subindices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indice_id');
            $table->string('titulo');
            $table->integer('pagina');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('indice_id')->references('id')->on('indices')->onDelete('CASCADE')->onUpgrade('CASCADE');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subindices');
    }
}
