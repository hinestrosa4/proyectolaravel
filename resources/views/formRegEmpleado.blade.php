@section('title', 'Registro Empleados')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>

    <form id="form" class="row g-3 needs-validation" method="POST" action="{{ route('formRegEmpleado') }}">
        @csrf
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1>Registro de empleados</h1>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">DNI</label>
            <input type="text" name="nif" class="form-control" id="nif" value="{{ old('nif') }}"
                placeholder="NIF / DNI">
            {!! $errors->first('nif', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}"
                placeholder="Apellidos, Nombre">
            {!! $errors->first('nombre', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
            {!! $errors->first('password', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Fecha Alta</label>
            <input type="date" name="fecha_alta" class="form-control" id="fecha_alta" value="{{ old('fecha_alta') }}">
            {!! $errors->first('fecha_alta', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Correo electrónico</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}"
                    placeholder="Correo" aria-describedby="inputGroupPrepend">
            </div>
            {!! $errors->first('email', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}"
                placeholder="Teléfono">
            {!! $errors->first('telefono', '<span style=color:red>:message</span>') !!}
        </div>

        {{-- <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Fecha Alta</label>
        <input type="date" name="fechaAlta" class="form-control" id="fechaAlta" value="{{ now()->format('Y-m-d') }}">
    </div> --}}

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Tipo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="es_admin" id="operario" value="0"
                    {{ old('es_admin') == '0' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Operario
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="es_admin" id="administrador" value="1"
                    {{ old('es_admin') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Administrador
                </label>
            </div>
            {!! $errors->first('es_admin', '<span style=color:red>:message</span>') !!}
        </div>

        <div class="col-12">
            <button class="btn btn-success" type="submit">Enviar Formulario</button>
        </div>
    </form>
@endsection
