<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseFourController extends Controller
{
    public function index(){

        $data['array'] = [];
        $data['result'] = '';
        $data['index1'] = 3;
        $data['index2'] = 4;

        $return = $this->infinite_table(8, 8, $data['index1'], $data['index2']);

        if(is_array($return)){
            $data['array'] = $return['array'];
            $data['result'] = $return['result'];
        }
    
        return view('exercise_four', $data);
    }

    public function store(Request $request){

        $request->validate([
            'rows' => 'required',
            'columns' => 'required',
            'rowindex' => 'required',
            'columnindex' => 'required'
        ]);

        $dataStore['rows'] = $request->input('rows');
        $dataStore['columns'] = $request->input('columns');
        $dataStore['param1'] = $request->input('rowindex');
        $dataStore['param2'] = $request->input('columnindex');

        $return = $this->infinite_table($dataStore['rows'], $dataStore['columns'], $dataStore['param1'], $dataStore['param2']);

        if(is_array($return)){
            $dataStore['array'] = $return['array'];
            $dataStore['result'] = $return['result'];
        }

        Session::flash("dataStore",$dataStore);
        return redirect()->to('ejercicio4');
    }

    /**
     * Función para crear una tabla y obtener el indice
     */
    private function infinite_table($row_size, $column_size, $row_position, $column_position) {
      
        $cont = 1;

        //Recorre todas las filas para crear un array.
        for($i = 0; $i < $row_size - 1; $i++){
            $decrease = $i + 1;
            if($i == 0)
                $array2[0][0] = 0;

            for($j = 0; $j <= $i + 1; $j++){
                if($j <= $column_size){
                    $array2[$decrease][$j] = $cont;
                    $decrease--;
                    $cont++;
                }
            }
        }

         //aun faltan filas por recorrer.
         if($row_size > $column_size){
            $campos =  $row_size - $column_size;
            
            for($i = 0; $i < $campos; $i++){ //1
                $decrease = $row_size;
                for($j = 0; $j <=  $row_size; $j++){
                    if($j <= $column_size){
                    $array2[$decrease][$j] = $cont; 
                    $decrease--;
                    $cont++;
                    }
                }
            }
        }

        //aun faltan columnas por recorrer
        if($row_size < $column_size){
            $campos =  $column_size - $row_size;
            
            for($i = 0; $i < $campos; $i++){ //2
                $increase = $i+1; //2
                for($j = $row_size; $j > 0; $j--){
                    $array2[$j-1][$increase] = $cont; 
                    $increase++;
                    $cont++;
                }
            }
        }

        //Valida si el indice existe si no existe devuelve un error.
        if(!@$array2[$row_position][$column_position]){
            $return = [
                'result' => "La posición de la fila o columna es mayor al tamaño del arreglo",
                'array' => $array2
            ];
        } else {
            $return = [
                'result' => $array2[$row_position][$column_position],
                'array' => $array2
            ];
        }
        return $return;
    }

}
