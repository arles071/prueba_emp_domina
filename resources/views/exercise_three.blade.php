@extends('layouts.template')
@section('title', 'Ejercicio tres')

@section('content')
    <h1>Ejercicio tres</h1>
    <p>
        Crear una función que toma como parámetro un string de hora y minutos “hh:mm”, y luego 
        devuelve el ángulo menor entre la mano de la hora y la mano del minuto. El formato de la 
        hora y minutos debe ser con dos dígitos, “01:45”, “10:30”, “02:25”, “00:00”, “12:30”, 
        “12:05”, “12:12”, “12:27”. Y se puede asumir que la mano de la hora siempre estará justo 
        en una hora sin importar cuantos minutos han pasado. También, si el parámetro de la 
        función no fue puesto correctamente o si la hora y minuto no es numérico, la función debe 
        tirar un error. 
    </p>
    <p>
        Las siguientes horas y minutos deben de regresar los siguientes valores de ángulos 
        menores:
        <ul>
            <li>"01:45" = 120 <b>resultado</b> {{$result1}}</li>
            <li>"10:30" = 120 <b>resultado</b> {{$result2}}</li>
            <li>"02:25" = 90 <b>resultado</b> {{$result3}}</li>
            <li>"00:00" = 0 <b>resultado</b> {{$result4}}</li>
            <li>"12:30" = 180 <b>resultado</b> {{$result5}}</li>
            <li>"12:05" = 30 <b>resultado</b> {{$result6}}</li>
            <li>"12:12" = 72 <b>resultado</b> {{$result7}}</li>
            <li>"12:27" = 162 <b>resultado</b> {{$result8}}</li>
        </ul>
    </p>
    <p>
        Para obtener el ángulo de las manecillas del reloj por favor agregar en el campo la hora y minutos con el siguiente formato "hh:mm"
    </p>

    <form action="/ejercicio3" method="post">
        @csrf
        <p>
            <label for="time">Hora y minutos (hh:mm):</label><br>
            <input type="string" name="time" id="time" pattern="^[0-2][0-3]:[0-5][0-9]$"><br>
            @if($errors->has('time'))
                <div class="error">{{ $errors->first('time') }}</div>
            @endif
        </p>
        <p>
            <input type="submit" value="Obtener resultado">
        </p>
    </form>

    @if (session('dataStore'))
    <div class="alert alert-success">
        
        <p>Datos: 
            <br>{!! session('dataStore')['param'] !!}
        </p>
        <p>resultado = {{ session('dataStore')['result'] }}</p>
    </div>
    @endif

@stop