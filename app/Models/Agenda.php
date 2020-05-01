<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class Agenda extends Model
{
    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
    
}
