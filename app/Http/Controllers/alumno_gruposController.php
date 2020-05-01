<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Alumno_Grupo;
use DB;

class alumno_gruposController extends Controller
{
    
    public function AsignarAlumno(Request $request)
    {
       try
       {
        $request->all();
        $asig = new Alumno_Grupo;    
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
    public function ReasignarAlumno(Request $request, $id)
    {
        try
        {
        $asig = Alumno_Grupo::where('Id', $id)->first(); 
       if($asig->count()>0)
        {                
        $asig->Id_Alumno = $request->input('cod');         
        $asig->Codigo_Grupo = $request->input('cod2');      
            $return = DB::table('alumno_grupos')->where('Id', $id)->update([
                'Id_Alumno' => $asig->Id_Alumno,
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
            $asig = DB::table('alumno_grupos')->select()->get();
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
