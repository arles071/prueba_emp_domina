@extends('layouts.template')
@section('title', 'Ejercicio cuatro')

@section('content')

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
       
        De acuerdo al ejemplo anterior se realiza una función la cual permite crear una tabla con 
        una sumatoria de forma diagonal iniciando desde la parte de abajo tal como se muestra en la tabla anterior 
        se reciben los siguentes datos por formulario: 
        <ul></ul>
        <li>Filas de la tabla</li>
        <li>Columnas de la tabla</li>
        <li>Indice de la fila</li>
        <li>Indice de la columna</li>
        <br>
        una vez recibido los datos nos devuelve el valor que se encuentra entre los indices fila y columna iniciando el conteo desde 0
       
    </p>

    <form action="/ejercicio4" method="post">
        @csrf
        <p>
            <label for="rows">Filas:</label><br>
            <input type="number" name="rows" @if (session('dataStore')) value="{{ session('dataStore')['rows']}}" @endif id="rows"><br>
        </p>
        <p>
            <label for="columns">Columnas:</label><br>
            <input type="number" name="columns" @if (session('dataStore')) value="{{ session('dataStore')['columns']}}" @endif id="columns"><br>
        </p>

        <p>
            <label for="rowindex">Indice filas:</label><br>
            <input type="number" name="rowindex" @if (session('dataStore')) value="{{ session('dataStore')['param1']}}" @endif id="rowindex"><br>
        </p>

        <p>
            <label for="columnindex">Indice Columnas:</label><br>
            <input type="number" name="columnindex" @if (session('dataStore')) value="{{ session('dataStore')['param2']}}" @endif id="columnindex"><br>
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
        <p><b>Filas: </b>{{ session('dataStore')['rows'] }}</p>
        <p><b>Columnas: {{ session('dataStore')['columns'] }}</b></p>
        <p><b>Parametros: </b>{{ session('dataStore')['param1'] }}, {{ session('dataStore')['param2'] }}</p>
        <p><b>result: </b>{{ session('dataStore')['result'] }}</p>
    </div>
    @endif

@stop