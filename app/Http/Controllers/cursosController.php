<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Estado;
use DB;

class cursosController extends Controller
{
    public function InsertCurso(Request $request)
    {
       try
       {
        $request->all();
        $curso = new Curso;    
        $curso->Codigo_Curso = $request->input('cod');     
        $curso->Nombre = $request->input('Nombre');      
        $curso->Codigo_Grupo = $request->input('cod2');       
        $x = $curso->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateCurso(Request $request, $id)
    {
        try
        {
        $curso = Curso::where('Id', $id)->first(); 
       if($curso->count()>0)
        {  
        $curso->Nombre = $request->input('grado');      
        $curso->Codigo_Grupo = $request->input('seccion');  
            $return = DB::table('cursos')->where('Id', $id)->update([
                'Nombre' => $curso->Nombre,
                'Codigo_Grupo' => $curso->Codigo_Grupo
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
    public function DeleteCurso($id)
    {
        try
        {
            $curso = Curso::where('Id', $id)->first(); 
            if($curso->count()>0)
            {
                $return = DB::table('cursos')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadCurso()
    {
        try
        {
            $curso = DB::table('cursos')->select()->get();
            return $curso;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainCurso($id)
    {
        try {
            $curso = DB::table('cursos')->where('Id', $id)->get();
            if($curso ->Count()> 0)
            {
                return $curso;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
