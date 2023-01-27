<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseUnaController extends Controller
{
    public function index(){

        $data['reply1'] = $this->calculatePoints([1,2,3,4,5]);
        $data['reply2'] = $this->calculatePoints([15,25,35]);
        $data['reply3'] = $this->calculatePoints([8,8]);

     
        return view('exercise_una', $data);
    }

    public function store(Request $request){

        $request->validate([
            'arreglo' => 'required'
        ]);

        $newArreglo = explode(',', $request->input('arreglo'));

        $dataStore['param'] = json_encode($newArreglo);
        $dataStore['result'] = $this->calculatePoints($newArreglo);

        Session::flash("dataStore",$dataStore);
        return redirect()->to('ejercicio1');
    }


    /**
     * Devuelve la suma de puntos de un arreglo.
     * Agregue 1 punto por cada número par en el arreglo.
     * Suma 3 puntos por cada número impar en el arreglo.
     * Agregue 5 puntos por cada vez que encuentre un 8 en el arreglo.
     */
    private function calculatePoints(Array $arreglo){
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
