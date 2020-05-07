<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Maestro;
use DB;

class maestrosController extends Controller
{
    public function InsertMaestro(Request $request)
    {
       try
       {
        $request->all();
        $maestro = new Maestro;     
        $maestro ->Id_Maestro = $request->input('carnet');   
        $maestro ->DUI = $request->input('dui');   
        $maestro ->Nombre1 = $request->input('N1');   
        $maestro ->Nombre2 = $request->input('N2');   
        $maestro ->Apellido1 = $request->input('A1');   
        $maestro ->Apellido2 = $request->input('A2');   
        $maestro ->Fecha_Nac = $request->input('fecha');   
        $maestro ->Id_Estado = $request->input('id1');   
        $maestro ->Id_Credencial = $request->input('id2');       
        $x = $maestro->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateMaestro(Request $request, $id)
    {
        try
        {
        $maestro = Maestro::where('Id', $id)->first(); 
       if($maestro->count()>0)
        {
            
        $maestro ->Nombre1 = $request->input('N1');   
        $maestro ->Nombre2 = $request->input('N2');   
        $maestro ->Apellido1 = $request->input('A1');   
        $maestro ->Apellido2 = $request->input('A2');   
        $maestro ->Fecha_Nac = $request->input('fecha');   
        $maestro ->Id_Estado = $request->input('id1');   
        $maestro ->Id_Credencial = $request->input('id2');       
            $return = DB::table('maestros')->where('Id', $id)->update([
                'Nombre1' => $maestro->Nombre1,
                'Nombre2' => $maestro->Nombre1,
                'Apellido1' => $maestro->Nombre1,
                'Apellido2' => $maestro->Nombre1,
                'Fecha_Nac' => $maestro->Nombre1,
                'Id_Estado' => $maestro->Nombre1,
                'Id_Credencial' => $maestro->Nombre1,
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
    public function DeleteMaestro($id)
    {
        try
        {
            $maestro = Maestro::where('Id', $id)->first(); 
            if($maestro->count()>0)
            {
                $return = DB::table('maestros')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadMaestro()
    {
        try
        {
            $maestro = DB::table('maestros')->select()->get();
            return $maestro;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainMaestro($id)
    {
        try {
            $maestro = DB::table('maestros')->where('Id_Maestro', $id)->get();
            if($maestro ->Count()> 0)
            {
                return $maestro;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
