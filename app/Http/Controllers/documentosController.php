<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Documento;
use DB;

class documentosController extends Controller
{
    public function InsertDocumento(Request $request)
    {
       try
       {
        $request->all();
        $doc = new Documento;    
        $doc->Codigo_Documento = $request->input('cod');     
        $doc->nombre = $request->$request->file('Doc')->getClientOriginalName();   
        $request->file('Doc')->store('Documentos');   
        $doc->Codigo_curso = $request->input('codd');        
        $x = $doc->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateDocumento(Request $request, $id)
    {
        try
        {
        $doc = Documento::where('Id', $id)->first(); 
       if($doc->count()>0)
        {  
            $doc->ruta = $request->input('ruta');      
            $doc->nombre = $request->input('nombre');   
            $doc->Codigo_curso = $request->input('cod2');   
            $return = DB::table('documentos')->where('Id', $id)->update([
                'ruta' => $doc->ruta,
                'nombre' => $doc->nombre,
                'Codigo_curso' => $doc->Codigo_curso
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
    public function DeleteDocumento($id)
    {
        try
        {
            $doc = Documento::where('Id', $id)->first(); 
            if($doc->count()>0)
            {
                $return = DB::table('documentos')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadDocumento()
    {
        try
        {
            $doc = DB::table('documentos')->select()->get();
            return $doc;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainDocumento($id)
    {
        try {
            $doc = DB::table('documentos')->where('Id', $id)->get();
            if($doc ->Count()> 0)
            {
                return $doc;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
