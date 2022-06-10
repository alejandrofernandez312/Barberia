<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') - Fer Barber</title>
    <link rel="icon" href="{{asset('logo.jpg')}}" type="image/png" />

    {{-- scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://github.com/viniciusmichelutti/jquery-stars/blob/master/dist/stars.min.js"></script>
    

    <script src="{{asset('js/calendar.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    
    {{-- styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    

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
        <a class="navbar-brand mt-2 mt-lg-0" href="{{url('/')}}">
          <img
            src="{{asset('logo.jpg')}}"
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
            <a class="nav-link" href="{{url('trabajos')}}">Trabajos</a>
          </li>
          @if(auth()->check() && auth()->user()->esCliente())
            <li class="nav-item">
              <a class="nav-link" href="{{url('misCitas')}}">Mis citas</a>
            </li>
          @endif
          @if(auth()->user())
            <li class="nav-item">
              <a class="nav-link" href="{{url('citas')}}">Pedir cita</a>
            </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Pedir cita</a>
          </li>
          @endif
          @if (auth()->user() && auth()->user()->esAdmin())
            <li class="nav-item">
              <a class="nav-link" href="{{route('gestion.index')}}">Gestionar citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('gestionusers.index')}}">Gestionar usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('gestionresenas.index')}}">Gestionar reseñas</a>
            </li>
          @endif
            <li class="nav-item">
              <a class="nav-link" href="{{url('sobreMi')}}">Sobre mi</a>
            </li>
          
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

{{-- footer --}}
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>ENCUÉNTRANOS</h6>
        <p class="text-justify">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
          </svg>
          645 765 745
        </p>
        <p class="text-justify">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
          </svg>
          Av. Santa Marta, s/n<br>
                    21005 Huelva<br>
        </p>
        <p class="text-justify">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
          </svg>
          alejandrofernandez312@gmail.com

        </p>
      </div>

      <div class="col-xs-6 col-md-3">
        
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Menú</h6>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 footer-links">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Trabajos</a>
          </li>
          @if(auth()->check() && auth()->user()->esCliente())
            <li class="nav-item">
              <a class="nav-link" href="{{url('misCitas')}}">Mis citas</a>
            </li>
          @endif
          @if(auth()->user())
            <li class="nav-item">
              <a class="nav-link" href="{{url('citas')}}">Pedir cita</a>
            </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Pedir cita</a>
          </li>
          @endif
          @if (auth()->user() && auth()->user()->esAdmin())
            <li class="nav-item">
              <a class="nav-link" href="{{route('gestion.index')}}">Gestionar citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('gestionusers.index')}}">Gestionar usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('gestionresenas.index')}}">Gestionar reseñas</a>
            </li>
          @endif
            <li class="nav-item">
              <a class="nav-link" href="{{url('sobreMi')}}">Sobre mi</a>
            </li>
          
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by 
     <a href="#">Alejandro Fernández</a>.
        </p>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <ul class="social-icons">
          <li>
            <a class="facebook" href="http://www.facebook.com" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg>
            </a>
          </li>
          <li>
            <a class="twitter" href="http://www.twitter.com" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg>
            </a></li>
          <li>
            <a class="linkedin" href="http://www.linkedin.com" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
              </svg>
            </a>
            </li>   
        </ul>
      </div>
    </div>
  </div>
</footer>
    
</body>
</html>