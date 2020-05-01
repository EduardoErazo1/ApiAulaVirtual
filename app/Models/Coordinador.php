<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Coordinador extends Model
{
    protected $table = 'coordinadores';
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
    public function credencial()
    {
        return $this->belongsTo('App\Models\Credencial');
    }
}
