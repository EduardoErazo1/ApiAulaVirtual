<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
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
