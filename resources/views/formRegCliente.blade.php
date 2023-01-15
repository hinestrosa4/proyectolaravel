@section('title','Registro Empleados')
@extends('base')
@section('menu')
<h1>Añadir Cliente</h1>
<form class="row g-3 needs-validation" method="POST" action="{{ route('formRegCliente') }}">
    @csrf
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">CIF</label>
      <input type="text" name="cif" class="form-control" id="cif" value="{{ old('cif') }}" placeholder="CIF">
    {!! $errors->first('cif','<span style=color:red>:message</span>') !!}
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
        <label for="validationCustom03" class="form-label">IBAN</label>
        <input type="text" name="iban" class="form-control" id="iban" value="{{ old('iban') }}" placeholder="ES12 1234 1234 12 0123456789">
        {!! $errors->first('iban','<span style=color:red>:message</span>') !!}
    </div>

      <div class="col-md-4">
        <label for="validationCustom03" class="form-label">País</label>
        <select class="form-select" aria-label="Default select example" name="pais">
          @foreach($paises as $pais)
          <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
          @endforeach
        </select>
    </div>

    <div class="col-md-4">
      <label for="validationCustom04" class="form-label">Moneda</label>
      <select class="form-select" aria-label="Default select example" name="moneda">
        <option value="1">Euro</option>
        <option value="2">Dolar</option>
        <option value="3">Libra</option>
      </select>
    </div>

    <div class="col-md-4">
      <label for="validationCustom03" class="form-label">Importe cuota mensual</label>
      <input type="text" name="cuota" class="form-control" id="cuota" value="{{ old('cuota') }}" placeholder="Importe de la cuota">
      {!! $errors->first('cuota','<span style=color:red>:message</span>') !!}
  </div>

    <div class="col-12">
      <button class="btn btn-success" type="submit">Añadir cliente</button>
    </div>
  </form>
@endsection