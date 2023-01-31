@section('title', 'Formulario Tarea')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>
    <form id="form" class="row g-3 needs-validation" method="POST" action="{{ route('formTarea') }}">
        @csrf
        <h1>Crear Tarea</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Cliente</label>
            <select class="form-select" name="clientes_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('clientes_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}</option>
                @endforeach
            </select>
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

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                <option value="P" {{ old('estado') == 'P' ? 'selected' : '' }}>Pendiente</option>
                <option value="R" {{ old('estado') == 'R' ? 'selected' : '' }}>Realizada</option>
                <option value="C" {{ old('estado') == 'C' ? 'selected' : '' }}>Cancelada</option>
            </select>
            {!! $errors->first('estado', '<span style=color:red>:message</span>') !!}
        </div>

        {{-- Fecha de creacion --}}

        <div class="col-md-4">
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
        </div>

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
        </div>
    </form>
@endsection
