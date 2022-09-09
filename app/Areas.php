<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    public $timestamps = false;
    protected $table = 'areas';
    protected $fillable = ['nombre'];

    public function empleados()
    {
        return $this->hasMany('App\Empleado', 'area_id', 'id');
    }
}
