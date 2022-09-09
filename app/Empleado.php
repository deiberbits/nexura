<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id'];
    public $timestamps = false;
    protected $table = 'empleados';


    public function area()
    {
        return $this->belongsTo('App\Areas', 'area_id', 'id', 'areas');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'empleado_rol', 'empleados_id', 'roles_id');
    }


}
