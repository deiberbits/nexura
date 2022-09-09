<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;
    protected $table = 'roles';
    protected $fillable = ['nombre'];

    public function empleados()
    {
        return $this->belongsToMany('App\Empleado', 'empleado_rol', 'roles_id', 'empleados_id');
    }
}
