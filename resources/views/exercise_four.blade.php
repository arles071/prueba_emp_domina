<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio cuatro</title>
</head>
<body>
    <h1>Ejercicio cuatro</h1>
    <p>
        Imagine una tabla infinita con filas y columnas numeradas con números naturales. La figura 
        muestra un procedimiento para recorrer dicha tabla asignando un número natural 
        consecutivo a cada tabla.

    </p>
    <div>

        <table>
            @foreach($array as $key => $item)
            
            <tr>
                
                @foreach($item as $key2 => $val)
                    @if($key === $index1 && $key2 === $index2)
                        <td style="border: 1px solid black; padding: 5px; background: rgba(255, 0, 0, 0.493);">{{  $val }}</td>
                    @else
                        <td style="border: 1px solid black; padding: 5px;">{{  $val }}</td>
                    @endif
                @endForeach
            </tr>
                
            @endForeach
        </table>
        <p><b>Parametros: </b>{{ $index1 }}, {{ $index2 }}</p>
        <p><b>Resultado: </b>{{ $result }}</p>
    </div>
    <p>
        Un par de números naturales (i, j) está representado por el número correspondiente a la 
        celda en la fila i y columna j. Por ejemplo, el par (3, 2) está representado por el número 
        natural 17.
    </p>
    <p>
        Crear una función que toma como parámetros (tamaño fila, tamaño columna, posición fila, 
        posición columna), debe retornar el número correspondiente de la posición de la fila y la 
        columna. Si la posición fila o columna es mayor al tamaño del arreglo debe arrojar un error
    </p>

    <form action="/ejercicio4" method="post">
        @csrf
        <p>
            <label for="filas">Filas:</label><br>
            <input type="number" name="filas" id="filas"><br>
        </p>
        <p>
            <label for="columnas">Columnas:</label><br>
            <input type="number" name="columnas" id="columnas"><br>
        </p>

        <p>
            <label for="indicefila">Indice filas:</label><br>
            <input type="number" name="indicefila" id="indicefila"><br>
        </p>

        <p>
            <label for="indicecolumna">Indice Columnas:</label><br>
            <input type="number" name="indicecolumna" id="indicecolumna"><br>
        </p>
        <p>
            <input type="submit" value="Obtener resultado">
        </p>
    </form>

    @if (session('dataStore'))
   
    <div>

        <table>
            @foreach(session('dataStore')['array'] as $key => $item)
            
            <tr>
                
                @foreach($item as $key2 => $val)
                    @if($key == session('dataStore')['param1'] && $key2 == session('dataStore')['param2'])
                        <td style="border: 1px solid black; padding: 5px; background: rgba(255, 0, 0, 0.493);">{{  $val }}</td>
                    @else
                        <td style="border: 1px solid black; padding: 5px;">{{  $val }}</td>
                    @endif
                @endForeach
            </tr>
                
            @endForeach
        </table>
        <p><b>Filas: </b>{{ session('dataStore')['filas'] }}</p>
        <p><b>Columnas: {{ session('dataStore')['columnas'] }}</b></p>
        <p><b>Parametros: </b>{{ session('dataStore')['param1'] }}, {{ session('dataStore')['param2'] }}</p>
        <p><b>Resultado: </b>{{ session('dataStore')['result'] }}</p>
    </div>
    @endif

    
</body>
</html>