<div class="container">
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{URL::to('/')}}">Domina</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
              <li class="nav-item">
                <a class="nav-link @if(request()->is('ejercicio1')) active @endif" aria-current="page" href="{{URL::to('/ejercicio1')}}">Ejercicio 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('ejercicio2')) active @endif" aria-current="page" href="{{URL::to('/ejercicio2')}}">Ejercicio 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('ejercicio3')) active @endif" aria-current="page" href="{{URL::to('/ejercicio3')}}">Ejercicio 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('ejercicio4')) active @endif" aria-current="page" href="{{URL::to('/ejercicio4')}}">Ejercicio 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('ejercicio5')) active @endif" aria-current="page" href="{{URL::to('/ejercicio5')}}">Ejercicio 5</a>
              </li>
              
            </ul>
           
          </div>
        </div>
      </nav>
</div>