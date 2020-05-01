<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Alumno_Grupo extends Model
{
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
}
