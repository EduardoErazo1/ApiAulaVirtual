<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Alumno;
use App\Models\Credencial;
use DB;

class alumnosController extends Controller
{
    public function InsertAlumno(Request $request)
    {
        try
       {
        $request->all();
        $alumno = new Alumno;  
        $alumno ->Id_Alumno = $request->input('carnet');   
        $alumno ->Nombre1 = $request->input('N1');   
        $alumno ->Nombre2 = $request->input('N2');   
        $alumno ->Apellido1 = $request->input('A1');   
        $alumno ->Apellido2 = $request->input('A2');   
        $alumno ->Fecha_Nac = $request->input('fecha');   
        $alumno ->Id_Estado = $request->input('id1');   
        $alumno ->Id_Credencial = $request->input('id2');   
        $x = $alumno->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return $e;

       }
       

        return $alumno;
    }
    public function UpdateAlumno(Request $request, $id)
    {
        try
        {
        $alumno = Alumno::where('Id', $id)->first(); 
       if($alumno->count()>0)
        {
            $alumno->Nombre1 = $request->input('N1');
            $alumno->Nombre2 = $request->input('N2');
            $alumno->Apellido1 = $request->input('A1');
            $alumno->Apellido2 = $request->input('A2');
            $alumno->Fecha_Nac = $request->input('fecha');
            $alumno->Id_Estado = $request->input('id1');
            $alumno->Id_Credencial = $request->input('id2');
            $return = DB::table('alumnos')->where('Id', $id)->update([
                'Nombre1' => $alumno->Nombre1,
                'Nombre2' => $alumno->Nombre2,
                'Apellido1' => $alumno->Apellido1,
                'Apellido2' => $alumno->Apellido2,
                'Fecha_Nac' => $alumno->Fecha_Nac,
                'Id_Estado' => $alumno->Id_Estado,
                'Id_Credencial' => $alumno->Id_Credencial,
            ]);
            if($return){
                return 'Actualizado correctamente';
            }
        }else
        {
            return 'none';
        }
        }catch(Exception $e)
        {
            return $e;
        }
    }
    public function DeleteAlumno($id)
    {
        try
        {
            $alumno = Alumno::where('Id', $id)->first(); 
            if($alumno->count()>0)
            {
                $return = DB::table('alumnos')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadAlumno()
    {
        try
        {
            $alumno = DB::table('alumnos')->select()->get();
            return $alumno;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }
   
    
    public function ObtainAlumno($id)
    {
        try {
            $alumno = DB::table('alumnos')->where('Id_Alumno', $id)->get();
            if($alumno ->Count()> 0)
            {

                return $alumno;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
