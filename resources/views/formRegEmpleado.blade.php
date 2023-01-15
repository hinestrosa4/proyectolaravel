@section('title','Registro Empleados')
@extends('base')
@section('menu')
<h1>Registro de empleados</h1>
<form class="row g-3 needs-validation" method="POST" action="{{ route('formRegEmpleado') }}">
    @csrf
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">DNI</label>
      <input type="text" name="dni" class="form-control" id="dni" value="{{ old('dni') }}" placeholder="DNI">
    {!! $errors->first('dni','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Nombre completo</label>
      <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" placeholder="Apellidos, Nombre">
      {!! $errors->first('nombre','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
      <label for="validationCustomUsername" class="form-label">Correo electrónico</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input type="text" name="correo" class="form-control" id="correo" value="{{ old('correo') }}" placeholder="Correo" aria-describedby="inputGroupPrepend">
      </div>
      {!! $errors->first('correo','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
      <label for="validationCustom03" class="form-label">Teléfono</label>
      <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}" placeholder="Teléfono">
      {!! $errors->first('telefono','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Dirección</label>
        <input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}" placeholder="Dirección">
        {!! $errors->first('direccion','<span style=color:red>:message</span>') !!}
    </div>

      {{-- <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Fecha Alta</label>
        <input type="date" name="fechaAlta" class="form-control" id="fechaAlta" value="{{ now()->format('Y-m-d') }}">
    </div> --}}

    <div class="col-md-4">
      <label for="validationCustom04" class="form-label">Tipo</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo" id="operario" value="op" {{ old('tipo') == 'op' ? 'checked' : '' }}>
        <label class="form-check-label" for="flexRadioDefault1">
          Operario
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo" id="administrador" value="admin" {{ old('tipo') == 'admin' ? 'checked' : '' }}>
        <label class="form-check-label" for="flexRadioDefault2">
          Administrador
        </label>
      </div>
      {!! $errors->first('tipo','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-12">
      <button class="btn btn-success" type="submit">Enviar Formulario</button>
    </div>
  </form>
@endsection