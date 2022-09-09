<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id()->comment('Identificador del empleado');
            $table->string('nombre')->length(255)->nullable(false)->comment('Nombre del empleado');
            $table->char('sexo', 1)->nullable(false)->comment('Sexo del empleado');
            $table->integer('boletin')->length(11)->nullable(true)->comment('Boletin del empleado');
            $table->string('email')->length(255)->nullable(false)->comment('Correo electronico del empleado');
            $table->longText('descripcion')->length(255)->nullable(false)->comment('Descripcion del empleado');
            $table->foreignId('areas_id')->nullable(false)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('Area de la empresa a la que pertenece el empleado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
