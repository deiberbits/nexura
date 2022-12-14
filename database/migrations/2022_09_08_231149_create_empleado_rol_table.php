<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_rol', function (Blueprint $table) {
            $table->foreignId('roles_id')->nullable(false)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('Identificador del rol');
            $table->foreignId('empleados_id')->nullable(false)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('Identificador del empleado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_rol');
    }
}
