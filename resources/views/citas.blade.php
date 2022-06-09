@extends('plantilla')

@section('titulo')
    Citas
@endsection


@section('contenido')

    <div class="container mt-3">
        <h1 class="display-1 bg-light rounded-pill text-center">Pedir cita</h1>
        <p class="text-center">*El horario es de Lunes a Viernes de 9-13:30h y de 17-19:30h*</p>

        <div id="calendar"></div> <br><br>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mx-auto bg-light p-2" id="formulario">
            <form action="{{ route('citas.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div>
                {{-- fechacita --}}
                <label for="fechacita" class="form-label" >Fecha cita: </label>
                <input type="text" class="form-control" name="fechacita" id="lblFechacita" value="Fecha" readonly>
                @if(auth()->user())
                  {{-- nombre --}}
                  <label for="nombre" class="form-label admin">Nombre: </label>
                  <input type="text" class="form-control" name="nombre" id="lblNombre" value="{{ old('nombre', Auth::user()->name) }}">
                  @error('nombre')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
        
                  {{-- apellidos --}}
                  <label for="apellidos" class="form-label admin">Apellidos: </label>
                  <input type="text" class="form-control" name="apellidos" id="lblApellidos" value="{{ old('apellidos', Auth::user()->surnames) }}">
                  @error('apellidos')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror

                  {{-- numero --}}
                  <label for="numero" class="form-label admin">Número de teléfono: </label>
                  <input type="phone" class="form-control" name="numero" id="lblNumero" value="{{ old('numero', Auth::user()->phone) }}">
                  @error('numero')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror

                  {{-- correo --}}
                  <label for="correo" class="form-label admin">Correo electrónico: </label>
                  <input type="text" class="form-control" name="correo" id="lblCorreo" value="{{ old('correo', Auth::user()->email) }}">
                  @error('correo')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                @endif

                {{-- servicios --}}
                <label for="servicio" class="form-label">Servicio: </label>
                <select name="servicio" id="slServicio" class="form-select">
                  <option value="0" selected>Seleccione una opción</option>
                  @foreach ($servicios as $servicio)
                      <option value="{{$servicio->servicio_id}}">{{$servicio->nombre}} {{ $servicio->precio}}€</option>
                  @endforeach
                </select>
                @error('servicio')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                @if(auth()->user()->esAdmin())
                    {{-- servicios --}}
                  <label for="cliente" class="form-label" >Cliente: </label>
                  <select name="cliente" id="slCliente" class="form-select">
                    <option value="0" selected>Seleccione una opción</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}} {{ $user->surnames}}</option>
                    @endforeach
                  </select><br>
                  @error('cliente')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                @endif

                {{-- <p id="precioTotal"></p> --}}
                
              </div>
            
        </div>
        <div class="modal-footer">
          
          <input type="submit" class="btn btn-primary" value="Pedir cita">
          @if(auth()->user()->esAdmin())
            <input type="button" class="btn btn-success" value="Modificar cita" onclick="">
            <input type="button" class="btn btn-danger" id="btBorrar" value="Cancelar cita" onclick="cancelarCita()">
          @endif
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Volver</button>
        </div>
      </div>
    </div>
  </div>
</form>


  {{-- Modal 2 --}}

  <div id="dialog-message" title="Fecha errónea" style="display: none;">
    <p style="color:red;">
      Por favor, escoja una hora dentro del horario:
    </p>
    <p>
      <b>Mañanas: 9-13:30h  <br>Tardes: 17-19:30h</b>
    </p>
  </div>
 
    </div> 

    
@endsection