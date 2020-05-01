<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Maestro extends Model
{
    public function maestro_Grupo()
    {
        return $this->hasMany('App\Models\Maestro_Grupo');
    }
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
    public function credencial()
    {
        return $this->belongsTo('App\Models\Credencial');
    }
}
