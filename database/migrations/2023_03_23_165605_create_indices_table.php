<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('indice_pai_id')->nullable();
            $table->string('titulo');
            $table->integer('pagina');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('CASCADE')->onUpgrade('CASCADE');;
            $table->foreign('indice_pai_id')->references('id')->on('indices')->onDelete('CASCADE')->onUpgrade('CASCADE');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indices');
    }
}
