<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Credencial;
use DB;

class credencialesController extends Controller
{
    public function InsertCredencial(Request $request )
    {
       try
       {
        $request->all();
        $credencial = new Credencial;    
        $credencial ->contra = $request->input('credencial');      
        $x = $credencial->save();  
        return $x;
       }
       catch(Exception $e)
       {
        return $e;

       }
        
    }
    public function UpdateCredencial(Request $request, $id)
    {
        try
        {
        $credencial = Credencial::where('Id', $id)->first(); 
       if($credencial->count()>0)
        {
            $credencial->contra = $request->input('credencial');
            $return = DB::table('credenciales')->where('Id', $id)->update([
                'contra' => $credencial->contra,
            ]);
            if($return){
                return 'Actualizado correctamente';
            }
        }
        }catch(Exception $e)
        {
            return $e;
        }
    }
    public function DeleteCredencial($id)
    {
        try
        {
            $credencial = Credencial::where('Id', $id)->first(); 
            if($credencial->count()>0)
            {
                $return = DB::table('credenciales')->where('Id', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        }catch(Exception $e)
        {
            return $e;
        }
    }
    public function ReadCredencial()
    {
        try
        {
            $credencial = DB::table('credenciales')->select()->get();
            return $credencial;
            
        }
        catch(Exception $e)
        {
            return $e;

        }
    }

    public function ObtainCredencial($id)
    {
        try {
            $credencial = DB::table('credenciales')->where('Id', $id)->get();
            if($credencial ->Count()> 0)
            {
                return $credencial;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
