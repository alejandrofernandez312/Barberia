@extends('plantilla')

@section('titulo')
    Inicio
@endsection


@section('contenido')

    <div class="container mt-3">
        <h1 class="display-1 bg-light rounded-pill text-center">Pedir cita</h1>
        <p class="text-center">*El horario es de 9-13:30h y de 17-19:30h*</p>

        <div id="calendar"></div> <br><br>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedir cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mx-auto bg-light p-2" id="formulario">
            <form action="{{ route('citas.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div>
                <p>*Advertencia: si no has iniciado sesión no podrás cancelar la cita desde la aplicación, deberás llamar a la barbería.*</p>
                {{-- fechacita --}}
                <label for="fechacita" class="form-label">Fecha cita: </label>
                <input type="text" class="form-text" name="fechacita" id="lblFechacita" value="Fecha" readonly><br>
      
                {{-- nombre --}}
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" class="form-text" name="nombre" id="lblNombre" value="{{ old('nombre') }}"><br>
                @error('nombre')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
      
                {{-- apellidos --}}
                <label for="apellidos" class="form-label">Apellidos: </label>
                <input type="text" class="form-text" name="apellidos" id="lblApellidos"><br>
                @error('apellidos')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                {{-- numero --}}
                <label for="numero" class="form-label">Número de teléfono: </label>
                <input type="phone" class="form-text" name="numero" id="lblNumero"><br>
                @error('numero')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                {{-- correo --}}
                <label for="correo" class="form-label">Correo electrónico: </label>
                <input type="phone" class="form-text" name="correo" id="lblCorreo"><br>
                @error('correo')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                {{-- servicios --}}
                <label for="servicio" class="form-label">Servicio: </label>
                <select name="servicio" id="slServicio">
                  <option value="0" selected>Seleccione una opción</option>
                  @foreach ($servicios as $servicio)
                      <option value="{{$servicio->servicio_id}}">{{$servicio->nombre}} {{ $servicio->precio}}€</option>
                  @endforeach
                </select><br>
                @error('servicio')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                {{-- <p id="precioTotal"></p> --}}
                
              </div>
            
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Pedir cita">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>

  {{-- Modal 2 --}}

  <div id="dialog-message" title="Fecha errónea">
    <p style="color:red;">
      Por favor, escoja una hora dentro del horario:
    </p>
    <p>
      <b>Mañanas: 9-13:30h  <br>Tardes: 17-19:30h</b>
    </p>
  </div>
  

 
    </div> 

    
@endsection