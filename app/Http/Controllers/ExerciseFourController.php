<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseFourController extends Controller
{
    public function index(){

        $data['array'] = [];
        $data['respuesta'] = '';
        $data['index1'] = 3;
        $data['index2'] = 4;

        $return = $this->numero_correspondienteparam(8, 8, $data['index1'], $data['index2']);

        if(is_array($return)){
            $data['array'] = $return['array'];
            $data['result'] = $return['result'];
        }
    
        return view('exercise_four', $data);
    }

    public function store(Request $request){

        $request->validate([
            'filas' => 'required',
            'columnas' => 'required',
            'indicefila' => 'required',
            'indicecolumna' => 'required'
        ]);

        $dataStore['filas'] = $request->input('filas');
        $dataStore['columnas'] = $request->input('columnas');
        $dataStore['param1'] = $request->input('indicefila');
        $dataStore['param2'] = $request->input('indicecolumna');

        $return = $this->numero_correspondienteparam($dataStore['filas'], $dataStore['columnas'], $dataStore['param1'], $dataStore['param2']);

        if(is_array($return)){
            $dataStore['array'] = $return['array'];
            $dataStore['result'] = $return['result'];
        }

        Session::flash("dataStore",$dataStore);
        return redirect()->to('ejercicio4');
    }

    private function numero_correspondienteparam($tamaño_fila, $tamaño_columna, $posicion_fila, $posicion_columna) {
      
        $cont = 1;

        for($i = 0; $i < $tamaño_fila - 1; $i++){

            $decrementar = $i + 1;
            
            if($i == 0){
                $array2[0][0] = 0;
            }

            for($j = 0; $j <= $i + 1; $j++){

                if($j <= $tamaño_columna)
                {
                    $array2[$decrementar][$j] = $cont;
                    $decrementar--;
                    $cont++;
                }
            }

        }

         //aun faltan columnas por recorrer por recorrer
         if($tamaño_fila > $tamaño_columna){
            $campos =  $tamaño_fila - $tamaño_columna;
            
            for($i = 0; $i < $campos; $i++){ //1
                $decrementar = $tamaño_fila;

                for($j = 0; $j <=  $tamaño_fila; $j++){
                    if($j <= $tamaño_columna)
                    {
                    $array2[$decrementar][$j] = $cont; 
                    $decrementar--;
                    $cont++;
                    }
                    }
            }
        }

        //aun faltan columnas por recorrer por recorrer
        if($tamaño_fila < $tamaño_columna){
            $campos =  $tamaño_columna - $tamaño_fila;
            
            for($i = 0; $i < $campos; $i++){ //2
                $aumentar = $i+1; //2

                for($j = $tamaño_fila; $j > 0; $j--){
                    $array2[$j-1][$aumentar] = $cont; 
                    $aumentar++;
                    $cont++;
                }
            }
        }
        



        //echo "<pre>";
        //print_r($array2);
        if(!@$array2[$posicion_fila][$posicion_columna]){
            $return = [
                'result' => "La posición de la fila o columna es mayor al tamaño del arreglo",
                'array' => $array2
            ];
        } else {

            $return = [
                'result' => $array2[$posicion_fila][$posicion_columna],
                'array' => $array2
            ];
        }

      
        return $return;
    }

}
