@section('title', 'Editar Empleado')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>
    <form id="form" method="POST" class="row g-3 needs-validation"
        action="{{ route('formEmpleadoUpdate', $empleado->id) }}">
        @csrf
        @method('PUT')

        <h1>Editar Empleado {{ $empleado->id }}</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">DNI</label>
            <input type="text" name="nif" class="form-control" id="nif" value="{{ old('nif', $empleado->nif) }}"
                placeholder="NIF / DNI">
            @error('nif')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" class="form-control" id="nombre"
                value="{{ old('nombre', $empleado->nombre) }}" placeholder="Apellidos, Nombre">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password"
                value="{{ old('password', $empleado->password) }}">
            @error('password')
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

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Tipo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="es_admin" id="operario" value="0"
                    {{ $empleado->es_admin == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Operario
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="es_admin" id="administrador" value="1"
                    {{ $empleado->es_admin == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Administrador
                </label>
            </div>
            @error('es_admin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        </div>
    </form>

@endsection
