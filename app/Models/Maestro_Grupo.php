<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Maestro_Grupo extends Model
{
    public function maestro()
    {
        return $this->belongsTo('App\Models\Maestro');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
}
