<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('materiales', function(Blueprint $table) {
                $table->increments('id');
                $table->string('codigo');
$table->string('titulo');
$table->string('autor');
$table->text('descripcion');
$table->string('tipo');
$table->string(''Revista'');
$table->string('portada');
$table->string('estado');

                $table->timestamps();
                $table->softDeletes();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materiales');
    }

}
