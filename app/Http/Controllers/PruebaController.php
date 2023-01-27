<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    //
    public function index(){

        //echo "01:45 = ".$this->calculateAngle("01:45"); echo "<br>";

        //$arreglo = [1,3,5,8,10]; //3+3+3+5+1 = 15
        //echo $this->calculoPuntuacion($arreglo);

        //$arreglo2 = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        //echo "-90 - 120 = ".$this->sumElementArray($arreglo2, -90, 120); echo "<br>";
        //echo "120 - 90 = ".$this->sumElementArray($arreglo2, 120, 90); echo "<br>";
        //echo "15 - 120 = ".$this->sumElementArray($arreglo2, 15, 120); echo "<br>";
        //echo "15 - 40 = ".$this->sumElementArray($arreglo2, 15, 40); echo "<br>";//90
        //echo "80 - 120 = ".$this->sumElementArray($arreglo2, 80, 120); echo "<br>";//270

        //echo $this->numero_correspondiente(8, 8, 6, 1); echo "<br>";// 18
        //echo $this->numero_correspondienteparam(8,10,2,4); echo "<br>";// 30
        //echo $this->numero_correspondienteparam2(4,6,1,4); echo "<br>";// 16
        //echo $this->numero_correspondienteparam2(5,4,1,4); echo "<br>";
        //echo $this->numero_correspondienteparam2(8, 8, 7, 7); echo "<br>";// 18
    
        //echo $this->numero_correspondiente(3, 4, 4, 3); // Error: La posición de la fila o columna es mayor al tamaño del arreglo


        //echo "<br>";
        //echo "******************************************";echo "<br>";
        echo $this->maximo_perimetro(1, 0); echo "<br>";// 0
        echo $this->maximo_perimetro(1, 1); echo "<br>";// 4
        echo $this->maximo_perimetro(2, 3); echo "<br>";// 8
        echo $this->maximo_perimetro(3, 8); echo "<br>";// 16
        echo $this->maximo_perimetro(3, 4); echo "<br>";// 16
        echo $this->maximo_perimetro(0, 0); echo "<br>";// Error
        
        $reply = 0;
        return view('prueba')->with('reply', $reply);
    }

    private function calculoPuntuacion(Array $arreglo){
        $sumaCalculo = 0;
        foreach($arreglo as $num){
            if($num === 8)
                $sumaCalculo += 5; //número ocho en el arreglo
            else if (($num % 2) == 0)
                $sumaCalculo += 1; //número par
            else
                $sumaCalculo += 3; //Es un número impar
        }
        return $sumaCalculo;
    }


    private function numero_correspondienteparam2($tamaño_fila, $tamaño_columna, $posicion_fila, $posicion_columna) {
      
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
        if(!@$array2[$posicion_fila][$posicion_columna])
            return "La posición de la fila o columna es mayor al tamaño del arreglo";
      
        return $array2[$posicion_fila][$posicion_columna];
    }

    //8,8,6,1 = 29
    //8,8,3,4 = 32
    private function numero_correspondienteparam($tamaño_fila, $tamaño_columna, $posicion_fila, $posicion_columna) {

        $cont = 1;

        if ($posicion_fila > $tamaño_fila || $posicion_columna > $tamaño_columna) {
            return "La posición de la fila o columna es mayor al tamaño del arreglo";
        }

        for($i = 0; $i < $tamaño_fila - 1; $i++){
            $decrementar = $i + 1;
            
            if($i == 0){
                $array2[0][0] = 0;
            }

            for($j = 0; $j <= $i + 1; $j++){
                
                $array2[$decrementar][$j] = $cont;
                $decrementar--;
                $cont++;
            }

        }


        //echo "<pre>";
        //print_r($array2);
      
        return $array2[$posicion_fila][$posicion_columna];
    }

    /**
     * Imagine una tabla infinita con filas y columnas numeradas con números naturales. La figura 
      *  muestra un procedimiento para recorrer dicha tabla asignando un número natural 
      *  consecutivo a cada tabla
      * Un par de números naturales (i, j) está representado por el número correspondiente a la 
        * celda en la fila i y columna j. Por ejemplo, el par (3, 2) está representado por el número 
        * natural 17.
        * Crear una función que toma como parámetros (tamaño fila, tamaño columna, posición fila, 
        * posición columna), debe retornar el número correspondiente de la posición de la fila y la 
        * columna. Si la posición fila o columna es mayor al tamaño del arreglo debe arrojar un error.
      *
     */
    private function numero_correspondiente($tamaño_fila, $tamaño_columna, $posicion_fila, $posicion_columna) {

        if ($posicion_fila > $tamaño_fila || $posicion_columna > $tamaño_columna) {
            return "La posición de la fila o columna es mayor al tamaño del arreglo";
        }
        return $posicion_fila * $tamaño_columna + $posicion_columna;
    }

    /**
     * El agricultor Rick tiene un jardín cuadrado de L metros de largo, dividido en una cuadrícula 
     * con módulos cuadrados L2, cada uno de 1 metro de largo. Rick quiere cultivar N módulos 
     * del jardín y sabe que la producción será mejor si el área cultivada recibe más agua. Utiliza 
     * tecnología de riego por goteo, lo cual se realiza mediante mangueras instaladas a lo largo 
     * del perímetro del área cultivada. 
     * Debe quedar claro que hay diferentes formas de elegir los N módulos que se deben cultivar. 
     * La siguiente figura muestra dos formas de cultivar N = 8 módulos en un jardín cuadrado con 
     * lado L = 3. El diagrama de la izquierda muestra una superficie cultivada con un perímetro de 
     * 16 de largo; el de la derecha representa otra posibilidad, con perímetro 12
     */
    private function maximo_perimetro($lado, $modulos) { //2,3
       
        if($lado == 0 && $modulos == 0){
            return 'Error';
        } else if ($modulos == 0) {
            return 0;
        }

        $area = $lado * $lado;

        if($modulos > $area){
            return 'No puede haber un modulo '.$modulos. ' en un area de '.$area;
        }

        $perimetro = 0;

        if ($modulos == $area) {
            $perimetro = 4 * $lado;
        } else if ($modulos < $lado) {
            $perimetro = 2 * $modulos + 2 * ($lado - $modulos);
        } else if ($modulos < 2 * $lado) {
            $perimetro = 2 * $lado + 2 * ($modulos - $lado);
        } else {
            $perimetro = 4 * $lado;
        }



        

      
        return $perimetro;
    }
    
    

   /**
     * En este ejercicio, estamos trabajando con un arreglo de 10 enteros, como sigue: 
     * [10, 20, 30, 40, 50, 60, 70, 80, 90, 100]. 0 es el primer índice y 9 es el último 
     * índice de la matriz.
     * Escribe una función que reciba dos números enteros como parámetros. 
     * La función devuelve la suma de los elementos de la matriz que se encuentran 
     * entre esos dos números enteros.
     *  Los dos enteros pasados a la función deben ser positivos; si no, la función debería 
     *  devolver -1. 
     *   Valide que el primer número entero sea menor que el segundo número entero. De lo 
     *  contrario, la función debería devolver 0.
     *   Si el primer número entero está en la matriz y el segundo está por encima de 100, por 
     *  ejemplo, 90 y 120, entonces la función debe devolver la suma de los números enteros 
     *  que están dentro del arreglo y entre el rango dado. En este caso, eso sería 190.
     *   Si no se encuentran ambos enteros en la matriz, por ejemplo 110 y 120, la función 
     *  debería devolver 0
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
        $rightAngle = abs($hourAngle - $minuteAngle);
        $leftAngle = abs($rightAngle - 360);

        //Valida el angulo menor.
        return ($rightAngle > $leftAngle) ? $leftAngle : $rightAngle;

    }

   
}
