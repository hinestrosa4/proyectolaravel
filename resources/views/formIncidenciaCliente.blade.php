@section('title', 'Formulario Tarea')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
</head>
    <style>
        #form {
            margin: 1em;
        }
    </style>
    <form id="form" class="row g-3 needs-validation" method="POST" action="{{ route('formIncidenciaCliente') }}">
        @csrf
        <h1>Crear incidencia como cliente</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
        {{-- <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Cliente</label>
            <select class="form-select" name="clientes_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('clientes_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Cliente</label>
            <input type="text" name="clientes_id" class="form-control" id="clientes_id" value="{{ old('clientes_id') }}"
                placeholder="CIF">
            {!! $errors->first('clientes_id', '<span style=color:red>:message</span>') !!}
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Teléfono</label>
            <input type="text" name="clientes_telefono" class="form-control" id="clientes_telefono" value="{{ old('clientes_telefono') }}"
                placeholder="Telefono">
            {!! $errors->first('clientes_telefono', '<span style=color:red>:message</span>') !!}
        </div>
        <br>
        <h3>Persona de contacto</h3>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}"
                placeholder="Apellidos, Nombre">
            {!! $errors->first('nombre', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}"
                placeholder="Telefono">
            {!! $errors->first('telefono', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Correo electrónico</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" name="correo" class="form-control" id="correo" value="{{ old('correo') }}"
                    placeholder="Correo" aria-describedby="inputGroupPrepend">
            </div>
            {!! $errors->first('correo', '<span style=color:red>:message</span>') !!}
        </div>
        <br>
        <h3>Detalles de la Tarea</h3>
        <div class="col-md-4">
            <label for="floatingTextarea2">Descripción</label>
            <textarea class="form-control" name="descripcion" placeholder="Deja una descripción" id="floatingTextarea2">{{ old('descripcion') }}</textarea>
            {!! $errors->first('descripcion', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="floatingTextarea2">Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="Dirección de la tarea"
                value="{{ old('direccion') }}" id="floatingTextarea2">
            {!! $errors->first('direccion', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Población</label>
            <input type="text" name="poblacion" class="form-control" id="poblacion" value="{{ old('poblacion') }}"
                placeholder="Población">
            {!! $errors->first('poblacion', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Código Postal</label>
            <input type="text" name="codigoPostal" class="form-control" id="codigoPostal"
                value="{{ old('codigoPostal') }}" placeholder="Código Postal">
            {!! $errors->first('codigoPostal', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Provincia</label>
            <select class="form-select" name="provincia">
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->cod }}" {{ old('provincia') == $provincia->cod ? 'selected' : '' }}>
                        {{ $provincia->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('provincia', '<span style=color:red>:message</span>') !!}
        </div>

        {{-- <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                <option value="P" {{ old('estado') == 'P' ? 'selected' : '' }}>Pendiente</option>
                <option value="R" {{ old('estado') == 'R' ? 'selected' : '' }}>Realizada</option>
                <option value="C" {{ old('estado') == 'C' ? 'selected' : '' }}>Cancelada</option>
            </select>
            {!! $errors->first('estado', '<span style=color:red>:message</span>') !!}
        </div> --}}

        {{-- Fecha de creacion --}}

        {{-- <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Operario encargado</label>
            <select class="form-select" name="empleados_id">
                @foreach ($empleados as $empleado)
                    @if ($empleado->es_admin == 0)
                        <option value="{{ $empleado->id }}" {{ old('empleados_id') == $empleado->id ? 'selected' : '' }}>
                            {{ $empleado->nombre }}
                        </option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('empleados_id', '<span style=color:red>:message</span>') !!}
        </div> --}}

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Fecha de realización</label>
            <input type="date" name="fechaRealizacion" class="form-control" id="fechaRealizacion"
                value="{{ old('fechaRealizacion') }}" placeholder="fechaRealizacion">
            {!! $errors->first('fechaRealizacion', '<span style=color:red>:message</span>') !!}
        </div>

        {{-- <div class="col-md-4">
            <label for="floatingTextarea2">Anotaciones Anteriores</label>
            <div class="form-floating">
                <textarea class="form-control" name="anotacionesAnt" placeholder="Deja las anotaciones anteriores aquí" id="floatingTextarea2">{{ old('anotacionesAnt') }}</textarea>
                {!! $errors->first('anotacionesAnt', '<span style=color:red>:message</span>') !!}
            </div>
        </div>

        <div class="col-md-4">
          <label for="floatingTextarea2">Anotaciones Posteriores</label>
          <div class="form-floating">
              <textarea class="form-control" name="anotacionesPos" placeholder="Deja las anotaciones posteriores aquí" id="floatingTextarea2">{{ old('anotacionesPos') }}</textarea>
              {!! $errors->first('anotacionesPos', '<span style=color:red>:message</span>') !!}
          </div>
      </div>

      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Fichero Resumen</label>
        <input type="file" name="ficheroResumen" class="form-control" id="ficheroResumen" value="{{ old('ficheroResumen') }}"
            placeholder="ficheroResumen">
        {!! $errors->first('ficheroResumen', '<span style=color:red>:message</span>') !!}
    </div> --}}

        <div class="col-12">
            <button class="btn btn-success" type="submit">Crear tarea</button>
            <a href="{{ route('login') }}" class="btn btn-primary" id="cancel-btn">Atras</a>

        </div>
    </form>
