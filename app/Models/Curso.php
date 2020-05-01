<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Curso extends Model
{
    public function documento()
    {
        return $this->hasMany('App\Models\Documento');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
}
