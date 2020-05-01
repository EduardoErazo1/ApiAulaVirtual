<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Agenda extends Model
{
    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
    
}
