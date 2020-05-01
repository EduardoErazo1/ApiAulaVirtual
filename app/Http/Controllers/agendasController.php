<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Agenda;
use DB;

class agendasController extends Controller
{
    public function InsertAgenda(Request $request)
    {
       try
       {
        $request->all();
        $agenda = new Agenda;    
        $agenda->Codigo_Agenda = $request->input('cod');     
        $agenda->fecha = $request->input('fecha');      
        $agenda->titulo = $request->input('titulo');     
        $agenda->descripcion = $request->input('desc');      
        $agenda->Codigo_Curso = $request->input('cod2');      
        $x = $agenda->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateAgenda(Request $request, $id)
    {
        try
        {
        $agenda = Agenda::where('Id', $id)->first(); 
       if($agenda->count()>0)
        {     
            $agenda->fecha = $request->input('fecha');      
            $agenda->titulo = $request->input('titulo');     
            $agenda->descripcion = $request->input('desc');    
            $return = DB::table('agendas')->where('Id', $id)->update([
                'fecha' => $agenda->fecha,
                'titulo' => $agenda->titulo,
                'descripcion' => $agenda->descripcion
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
    public function DeleteAgenda($id)
    {
        try
        {
            $agenda = Agenda::where('Id', $id)->first(); 
            if($agenda->count()>0)
            {
                $return = DB::table('agendas')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadAgenda()
    {
        try
        {
            $agenda = DB::table('agendas')->select()->get();
            return $agenda;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainAgenda($id)
    {
        try {
            $agenda = DB::table('agendas')->where('Id', $id)->get();
            if($agenda ->Count()> 0)
            {
                return $agenda;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
