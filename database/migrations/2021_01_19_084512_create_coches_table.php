<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCochesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('color');
            $table->integer('kilometros');
            $table->string('foto')->default('storage/img/coches/default.png');
            //me creo el campo que va aser foreign key se llama marcas_id
            $table->ForeignId('marca_id')->nullable();
            //hacemos que el campo anterior se foreign key de la tabla coches del campo id
            $table->foreign('marca_id')->references('id')
            ->on('marcas')
            ->onUpdate('cascade')
            ->onDelete('set null');

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
        Schema::dropIfExists('coches');
    }
}
