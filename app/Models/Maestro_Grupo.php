<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Maestro_Grupo extends Model
{
    protected $table = 'maestro_grupos';
    public function maestro()
    {
        return $this->belongsTo('App\Models\Maestro');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
}
