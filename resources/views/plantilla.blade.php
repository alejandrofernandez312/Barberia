<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') - Fer Barber</title>
    <link rel="icon" href="{{asset('logo.png')}}" type="image/png" />

    {{-- scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    

    <script src="{{asset('js/calendar.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    
    {{-- styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    

</head>
<body>

    {{-- NAVBAR --}}
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://i.pinimg.com/736x/a9/40/92/a9409281fa230ecd40b7f6e5f0594159.jpg"
            height="65"
            alt="Fer Barber Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Trabajos</a>
          </li>
          @if(auth()->user() && auth()->user()->esCliente())
            <li class="nav-item">
              <a class="nav-link" href="{{url('citas')}}">Pedir cita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('sobreMi')}}">Sobre mi</a>
            </li>
          @endif
          @if(auth()->user() && auth()->user()->esAdmin())
          <li class="nav-item">
            <a class="nav-link" href="">Citas diarias</a>
          </li>
          @endif
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
          
        @if(auth()->user())
        {{-- modificar perfil --}}
          <a href="{{route('users.index')}}" style="text-decoration: none;" class="text-dark">Usuario: {{auth()->user()->name}} {{auth()->user()->surnames}}</a>&nbsp;&nbsp;&nbsp;
          <a class="nav-link px-2 btn btn-warning text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          @else 
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            </ul>
        @endif
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  

  {{-- CONTENIDO --}}
  <div class="container">
    @yield('contenido')
  </div>
    
</body>
</html>