<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Alumno;
use App\Models\Maestro;
use App\Models\Coordinador;
use DB;

class LoginController extends Controller
{
    public function ValidateLogin(Request $request)
    {
        $alumno = new Alumno;
        $alumno = (new alumnosController)->ObtainAlumno($request->input('usuario'));
        if($alumno)
        {            
            $al = new Credencial;
            $al->Id = $alumno[0]->Id_Credencial;
            $data = Credencial::select('credenciales.contra','alumnos.Id_Alumno')
                ->join('alumnos','credenciales.Id','=','alumnos.Id_Credencial')
                ->get();
           if($data[0]->Id_Alumno == $request->input('usuario')&& $data[0]->contra == $request->input('contra'))
           {
               return"Vergon";
           }
           else
           {
            return"No Vergon";
             }
        }else
        {
           $maestro = new Maestro;
           $maestro = (new maestrosController)->ObtainMaestro($request->input('usuario'));
           if($maestro)
           {
               return "Simon";
           }else
           {
            $coordinanor = new Coordinador;
           $coordinanor = (new coordinadoresController)->ObtainCoordinador($request->input('usuario'));
           if($coordinanor)
           {
               return "Simon";
           }else
           {
            return "Simon't";
           }
           }
        }
    }
}
