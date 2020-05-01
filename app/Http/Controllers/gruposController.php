<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Grupo;
use DB;

class gruposController extends Controller
{
    public function InsertGrupo(Request $request)
    {
       try
       {
        $request->all();
        $grupo = new Grupo;    
        $grupo->Codigo_Grupo = $request->input('cod');     
        $grupo->Grado = $request->input('grado');      
        $grupo->Seccion = $request->input('seccion');       
        $x = $grupo->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateGrupo(Request $request, $id)
    {
        try
        {
        $grupo = Grupo::where('Id', $id)->first(); 
       if($grupo->count()>0)
        {  
        $grupo->Grado = $request->input('grado');      
        $grupo->Seccion = $request->input('seccion');  
            $return = DB::table('grupos')->where('Id', $id)->update([
                'Grado' => $grupo->Grado,
                'Seccion' => $grupo->Seccion
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
    public function DeleteGrupo($id)
    {
        try
        {
            $grupo = Grupo::where('Id', $id)->first(); 
            if($grupo->count()>0)
            {
                $return = DB::table('grupos')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadGrupo()
    {
        try
        {
            $grupo = DB::table('grupos')->select()->get();
            return $grupo;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainGrupo($id)
    {
        try {
            $grupo = DB::table('grupos')->where('Id', $id)->get();
            if($grupo ->Count()> 0)
            {
                return $grupo;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
