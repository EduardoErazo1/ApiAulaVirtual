<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Coordinador;
use DB;

class coordinadoresController extends Controller
{
    public function InsertCoordinador(Request $request)
    {
       try
       {
        $request->all();
        $coordinador = new Coordinador;     
        $coordinador ->Id_Coordinador = $request->input('carnet');   
        $coordinador ->DUI = $request->input('dui');   
        $coordinador ->Nombre1 = $request->input('N1');   
        $coordinador ->Nombre2 = $request->input('N2');   
        $coordinador ->Apellido1 = $request->input('A1');   
        $coordinador ->Apellido2 = $request->input('A2');   
        $coordinador ->Fecha_Nac = $request->input('fecha');   
        $coordinador ->Id_Estado = $request->input('id1');   
        $coordinador ->Id_Credencial = $request->input('id2');       
        $x = $coordinador->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return var_dump($e->getMessage());

       }
        
    }
    public function UpdateCoordinador(Request $request, $id)
    {
        try
        {
        $coordinador = Coordinador::where('Id', $id)->first(); 
       if($coordinador->count()>0)
        {
            
        $coordinador ->Nombre1 = $request->input('N1');   
        $coordinador ->Nombre2 = $request->input('N2');   
        $coordinador ->Apellido1 = $request->input('A1');   
        $coordinador ->Apellido2 = $request->input('A2');   
        $coordinador ->Fecha_Nac = $request->input('fecha');   
        $coordinador ->Id_Estado = $request->input('id1');   
        $coordinador ->Id_Credencial = $request->input('id2');       
            $return = DB::table('coordinadores')->where('Id', $id)->update([
                'Nombre1' => $coordinador->Nombre1,
                'Nombre2' => $coordinador->Nombre1,
                'Apellido1' => $coordinador->Nombre1,
                'Apellido2' => $coordinador->Nombre1,
                'Fecha_Nac' => $coordinador->Nombre1,
                'Id_Estado' => $coordinador->Nombre1,
                'Id_Credencial' => $coordinador->Nombre1,
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
    public function DeleteCoordinador($id)
    {
        try
        {
            $coordinador = Coordinador::where('Id', $id)->first(); 
            if($coordinador->count()>0)
            {
                $return = DB::table('coordinadores  ')->where('Id_Coordinador', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return var_dump($e->getMessage());
        }
    }
    public function ReadCoordinador()
    {
        try
        {
            $coordinador = DB::table('coordinadores')->select()->get();
            return $coordinador;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainCoordinador($id)
    {
        try {
            $coordinador = DB::table('coordinadores')->where('Id_Coordinador', $id)->get();
            if($coordinador ->Count()> 0)
            {
                return $coordinador;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
