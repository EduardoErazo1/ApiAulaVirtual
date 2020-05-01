<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    protected $table = 'credenciales';
    public function Alumno()
    {
        return $this->hasMany('App\Models\Alumno');
    }
    public function Maestro()
    {
        return $this->hasMany('App\Models\Maestro');
    }
    public function Coordinador()
    {
        return $this->hasMany('App\Models\Coordinador');
    }
}
