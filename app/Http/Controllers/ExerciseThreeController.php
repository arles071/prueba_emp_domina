<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExerciseThreeController extends Controller
{
    public function index(){
        
        $data['result1'] = $this->calculateAngle("01:45");
        $data['result2'] = $this->calculateAngle("10:30");
        $data['result3'] = $this->calculateAngle("02:25");
        $data['result4'] = $this->calculateAngle("00:00");
        $data['result5'] = $this->calculateAngle("12:30");
        $data['result6'] = $this->calculateAngle("12:05");
        $data['result7'] = $this->calculateAngle("12:12");
        $data['result8'] = $this->calculateAngle("12:27");
        $this->calculateAngle("12:278");


        return view('exercise_three', $data);
    }


    public function store(Request $request){

        $request->validate([
            'time' => 'required|regex:/(\d+\:\d+)/'
        ]);

        $dataStore['param'] = "Hora y minutos = ".$request->input('time');

        $dataStore['result'] = $this->calculateAngle($request->input('time'));;

        Session::flash("dataStore",$dataStore);
        return redirect()->to('ejercicio3');
    }

    /**
     * Función para calcular el angulo con hora y minutos
     * @param String
     */
    private function calculateAngle($time){

        $arrayTime = explode(':', $time);
        $hour = ($arrayTime[0] == 12) ? 0 : $arrayTime[0];  //hora
        $minute = $arrayTime[1];  //minuto

        $hourAngle = $hour * 30;
        $minuteAngle = $minute * 6;
        $rightAngle = abs($hourAngle - $minuteAngle); //abs conviete en entero un número
        $leftAngle = abs($rightAngle - 360);

        //Valida el angulo menor.
        return ($rightAngle > $leftAngle) ? $leftAngle : $rightAngle;

    }
}
