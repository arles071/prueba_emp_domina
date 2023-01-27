<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciseFiveController extends Controller
{
    public function index(){

        $data['result1'] = $this->maximum_perimeter(1,0);
        $data['result2'] = $this->maximum_perimeter(1,1);
        $data['result3'] = $this->maximum_perimeter(2,3);
        $data['result4'] = $this->maximum_perimeter(3,8);
        $data['result5'] = $this->maximum_perimeter(0,0);
        return view('exercise_five', $data);
    }


    public function store(Request $request){
        
    }

    private function maximum_perimeter($side, $module) { //2,3
       
        if($side == 0 && $module == 0){
            return 'Error';
        } else if ($module == 0) {
            return 0;
        }

        $area = $side * $side;

        if($module > $area){
            return 'No puede haber un modulo '.$module. ' en un area de '.$area;
        }

        $perimeter = 0;

        if ($module == $area) {
            $perimeter = 4 * $side;
        } else if ($module < $side) {
            $perimeter = 2 * $module + 2 * ($side - $module);
        } else if ($module < 2 * $side) {
            $perimeter = 2 * $side + 2 * ($module - $side);
        } else {
            $perimeter = 4 * $side;
        }
      
        return $perimeter;
    }
}
