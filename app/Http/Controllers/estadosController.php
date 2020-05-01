<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Estado;
use DB;
class estadosController extends Controller
{
    public function InsertEstado(Request $request)
    {
       try
       {
        $request->all();
        $estado = new Estado;    
        $estado->estado = $request->input('estado');      
        $x = $estado->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateEstado(Request $request, $id)
    {
        try
        {
        $estado = Estado::where('Id', $id)->first(); 
       if($estado->count()>0)
        {
            $estado->estado = $request->input('estado');
            $return = DB::table('estados')->where('Id', $id)->update([
                'estado' => $estado->estado,
            ]);
            if($return){
                return 'Actualizado correctamente';
            }
        }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        } 
    }
    public function DeleteEstado($id)
    {
        try
        {
            $estado = Estado::where('Id', $id)->first(); 
            if($estado->count()>0)
            {
                $return = DB::table('estados')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadEstado()
    {
        try
        {
            $estado = DB::table('estados')->select()->get();
            return $estado;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainEstado($id)
    {
        try {
            $estado = DB::table('estados')->where('Id', $id)->get();
            if($estado ->Count()> 0)
            {
                return $estado;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
