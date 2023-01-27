<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseTwoController extends Controller
{
    
    public function index(){
       
        return view('exercise_two');
    }

    public function store(Request $request){

        $arreglo2 = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        $request->validate([
            'num1' => 'required',
            'num2' => 'required'
        ]);

        $newArreglo = explode(',', $request->input('arreglo'));

        $dataStore['array'] = json_encode($arreglo2);
        $dataStore['param'] = "Número 1 = ".$request->input('num1'). "<br>Número 2 = ".$request->input('num2');

        $dataStore['result'] = $this->sumElementArray($arreglo2, $request->input('num1'), $request->input('num2'));

        Session::flash("dataStore",$dataStore);
        return redirect()->to('ejercicio2');
    }


     /**
     * devuelve la suma de los elementos de la matriz que se encuentran 
     * entre esos dos números enteros.
     */
    private function sumElementArray(Array $arreglo, Int $num1, Int $num2){

        $collection = collect($arreglo);
        $indice1 = array_search($num1, $arreglo); // consulto un dato en el array
        $indice2 = array_search($num2, $arreglo); // consulto un dato en el array

        //validaciones        
        if($num1 < 0 || $num2 < 0)
            return -1;
        else if($num1 > $num2)
            return 0;
        else if(empty($indice1) && empty($indice2))
            return 0;
        
        if(empty($indice1))
            $indice1  = $collection->search(function ($item, $key) use($num1){
                return $item >= $num1;
            });
        //80 - 120 = 270
        if(empty($indice2))
            $indice2 = count($arreglo) - 1;

        $sumArray = 0;

        while($indice1 <= $indice2){
            $sumArray += $arreglo[$indice1];
            $indice1++;
        }

        return $sumArray;
    }
}
