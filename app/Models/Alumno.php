<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Alumno extends Model
{
    public function Estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
    public function Credencial()
    {
        return $this->belongsTo('App\Models\Credencial');
    }
    public function Alumno_grupo()
    {
        return $this->hasMany('App\Models\Alumno_Grupo');
    }
}
