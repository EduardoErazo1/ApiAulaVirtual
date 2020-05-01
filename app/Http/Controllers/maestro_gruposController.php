<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Maestro_Grupo;
use DB;

class maestro_gruposController extends Controller
{
    public function AsignarMaestro(Request $request)
    {
       try
       {
        $request->all();
        $asig = new Maestro_Grupo;    
        $asig->Id_Maestro = $request->input('cod');         
        $asig->Codigo_Grupo = $request->input('cod2');      
        $x = $asig->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function ReasignarMaestro(Request $request, $id)
    {
        try
        {
        $asig = Maestro_Grupo::where('Id', $id)->first(); 
       if($asig->count()>0)
        {                
        $asig->Id_Maestro = $request->input('cod');         
        $asig->Codigo_Grupo = $request->input('cod2');      
            $return = DB::table('maestro_grupos')->where('Id', $id)->update([
                'Id_Maestro' => $asig->Id_Maestro,
                'Codigo_Grupo' => $asig->Codigo_Grupo,
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
    public function ReadAsignacion()
    {
        try
        {
            $asig = DB::table('maestro_grupos')->select()->get();
            return $asig;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainAsignacion($id)
    {
        try {
            $asig = DB::table('maestro_grupos')->where('Id', $id)->get();
            if($asig ->Count()> 0)
            {
                return $asig;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
