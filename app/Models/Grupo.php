<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Grupo extends Model
{
    public function Curso()
    {
        return $this->hasMany('App\Models\Curso');
    }
    public function maestro_Grupo()
    {
        return $this->hasMany('App\Models\Maestro_Grupo');
    }
}
