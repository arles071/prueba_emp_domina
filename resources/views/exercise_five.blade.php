@extends('layouts.template')
@section('title', 'Ejercicio cinco')

@section('content')

    <h1>Ejercicio cinco</h1>
    <p>
        El agricultor Rick tiene un jardín cuadrado de L metros de largo, dividido en una cuadrícula 
        con módulos cuadrados L2, cada uno de 1 metro de largo. Rick quiere cultivar N módulos 
        del jardín y sabe que la producción será mejor si el área cultivada recibe más agua. Utiliza 
        tecnología de riego por goteo, lo cual se realiza mediante mangueras instaladas a lo largo 
        del perímetro del área cultivada.
    </p>
    <p>
        Debe quedar claro que hay diferentes formas de elegir los N módulos que se deben cultivar. 
        La siguiente figura muestra dos formas de cultivar N = 8 módulos en un jardín cuadrado con 
        lado L = 3. El diagrama de la izquierda muestra una superficie cultivada con un perímetro de 
        16 de largo; el de la derecha representa otra posibilidad, con perímetro 12

    </p>
    <p>
        Rick quiere maximizar el perímetro del área seleccionada para optimizar la producción. 
        Luego, has sido contratado para ayudarlo a determinar el perímetro más grande que un 
        área de N módulos del jardín puede alcanzar. Hay varios casos a considerar:
    </p>
    <ul>
        <li>
            Cada caso se describe con una línea con dos números enteros L y N separados por un 
            espacio en blanco, indicando la longitud del lado del jardín y el número de módulos que 
            deben cultivarse, respectivamente (1 ≤ 𝐿 ≤ 106, 0 ≤ 𝑁 ≤ 𝐿2). 
        </li>
    </ul>
    <p>
        Los siguientes datos deben dar el siguiente resultado:
        (1, 0) = 0 (1, 1) = 4 (2, 3) = 8 (3, 8) = 16 (0, 0) = ERROR
    </p>

    <hr>
    <p>
        Resultado de las funciones realizadas.
    </p>
    <p><b>Resultado (1,0) = </b>{{ $result1 }}</p>
    <p><b>Resultado (1,1) = </b>{{ $result2 }}</p>
    <p><b>Resultado (2,3) = </b>{{ $result3 }}</p>
    <p><b>Resultado (3,8) = </b>{{ $result4 }}</p>
    <p><b>Resultado (0,0) = </b>{{ $result5 }}</p>
   

@stop