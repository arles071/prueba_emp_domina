@extends('layouts.template')
@section('title', 'Ejercicio uno')

@section('content')

    <h1>Ejercicio uno</h1>
    <p>
        Dada un arreglo de números enteros, calcule una puntuación total según las siguientes 
        reglas:
        <ul>
            <li>Agregue 1 punto por cada número par en el arreglo.</li>
            <li>Suma 3 puntos por cada número impar en el arreglo.</li>
            <li>Agregue 5 puntos por cada vez que encuentre un 8 en el arreglo</li>
        </ul>
    </p>
    <p>
        Ejemplo:
        <ol>
            <li>[1,2,3,4,5], respuesta = 11 <b>resultado</b> = {{ $reply1 }}</li>
            <li>[15,25,35], respuesta = 9 <b>resultado</b> = {{ $reply2 }}</li>
            <li>[8,8], respuesta = 10 <b>resultado</b> = {{ $reply3 }}</li>
        </ol>
    </p>

    <p>Si desea obtener un resultado diferente por favor agregar números enteros separados por coma en el siguiente formulario.</p>

    <form action="/ejercicio1" method="post">
        @csrf
        <input type="text" name="arreglo">
        <input type="submit" value="Obtener resultado">
    </form>

    @if (session('dataStore'))
    <div class="alert alert-success">
        <p>Array = {{ session('dataStore')['param'] }}</p>
        <p>Resultado = {{ session('dataStore')['result'] }}</p>
    </div>
    @endif


@stop