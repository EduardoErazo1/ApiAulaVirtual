<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alumno_gruposController extends Controller
{
    
    public function AsignarMaestro(Request $request)
    {
       try
       {
        $request->all();
        $asig = Maestro_Grupo;    
        $asig->Id_Alumno = $request->input('cod');         
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
        $asig->Id_Alumno = $request->input('cod');         
        $asig->Codigo_Grupo = $request->input('cod2');      
            $return = DB::table('maestro_grupos')->where('Id', $id)->update([
                'Id_Alumno' => $agenda->Id_Alumno,
                'Codigo_Grupo' => $agenda->Codigo_Grupo,
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
            $asig = DB::table('alumno_grupos')->where('Id', $id)->get();
            if($asig ->Count()> 0)
            {
                return $asig;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
