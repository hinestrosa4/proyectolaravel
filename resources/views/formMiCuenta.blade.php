@section('title', 'Mi Cuenta')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>
    <form id="form" method="POST" class="row g-3 needs-validation"
        action="{{ route('formMiCuentaUpdate', $empleado->id) }}">
        @csrf
        @method('PUT')

        <h1>Cuenta de: {{ $empleado->nombre }}</h1>
        <h3>NIF: {{ $empleado->nif }}</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" class="form-control" id="nombre"
                value="{{ old('nombre', $empleado->nombre) }}" placeholder="Apellidos, Nombre">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Fecha Alta</label>
            <input type="date" name="fecha_alta" class="form-control" id="fecha_alta"
                value="{{ old('fecha_alta', $empleado->fecha_alta) }}">
            @error('fecha_alta')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Correo electrónico</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" name="email" class="form-control" id="email"
                    value="{{ old('email', $empleado->email) }}" placeholder="Correo" aria-describedby="inputGroupPrepend">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono"
                value="{{ old('telefono', $empleado->telefono) }}" placeholder="Teléfono">
            @error('telefono')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </div>
    </form>

@endsection
