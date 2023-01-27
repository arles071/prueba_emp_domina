<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio dos</title>
</head>
<body>
    <h1>Ejercicio dos</h1>
    <p>
        En este ejercicio, estamos trabajando con un arreglo de 10 enteros, como sigue: [10, 20, 30, 
        40, 50, 60, 70, 80, 90, 100]. 0 es el primer índice y 9 es el último índice de la matriz.
        Escribe una función que reciba dos números enteros como parámetros. La función devuelve 
        la suma de los elementos de la matriz que se encuentran entre esos dos números enteros.
    </p>
    <p>
        Ejemplo:
    </p>
    <p>
        Por ejemplo, si usamos 30 y 60 como parámetros, la función debería devolver 180. 
        Algunos requisitos adicionales:
        <ul>
            <li>Los dos enteros pasados a la función deben ser positivos; si no, la función debería 
                devolver -1.
            </li>
            <li>
                Valide que el primer número entero sea menor que el segundo número entero. De lo 
                contrario, la función debería devolver 0.
            </li>
            <li>Si el primer número entero está en la matriz y el segundo está por encima de 100, por 
                ejemplo, 90 y 120, entonces la función debe devolver la suma de los números enteros 
                que están dentro del arreglo y entre el rango dado. En este caso, eso sería 190.
            </li>
            <li>Si no se encuentran ambos enteros en la matriz, por ejemplo 110 y 120, la función 
                debería devolver 0
            </li>
        </ul>
    </p>

    <form action="/ejercicio2" method="post">
        @csrf
        <p>
            <label for="num1">Número 1:</label><br>
            <input type="number" name="num1" id="num1"><br>
        </p>
        <p>
            <label for="num2">Número 2:</label><br>
            <input type="number" name="num2" id="num2"><br>
        </p>
        <p>
            <input type="submit" value="Obtener resultado">
        </p>
    </form>

    @if (session('dataStore'))
    <div class="alert alert-success">
        <p>Array = {{ session('dataStore')['array'] }}</p>
        <p>Datos: 
            <br>{!! session('dataStore')['param'] !!}
        </p>
        <p>Respuesta = {{ session('dataStore')['result'] }}</p>
    </div>
    @endif

    
</body>
</html>