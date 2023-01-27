<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseUnaController extends Controller
{
    public function index(){

        $data['respuesta1'] = $this->calculoPuntuacion([1,2,3,4,5]);
        $data['respuesta2'] = $this->calculoPuntuacion([15,25,35]);
        $data['respuesta3'] = $this->calculoPuntuacion([8,8]);

     
        return view('exercise_una', $data);
    }

    public function store(Request $request){

        $request->validate([
            'arreglo' => 'required'
        ]);

        $newArreglo = explode(',', $request->input('arreglo'));

        $dataStore['param'] = json_encode($newArreglo);
        $dataStore['result'] = $this->calculoPuntuacion($newArreglo);

        Session::flash("dataStore",$dataStore);
        return redirect()->to('ejercicio1');
    }


    private function calculoPuntuacion(Array $arreglo){
        $sumaCalculo = 0;
        foreach($arreglo as $num){
            if($num == 8)
                $sumaCalculo += 5; //número ocho en el arreglo
            else if (($num % 2) == 0)
                $sumaCalculo += 1; //número par
            else
                $sumaCalculo += 3; //Es un número impar
        }
        return $sumaCalculo;
    }

}
