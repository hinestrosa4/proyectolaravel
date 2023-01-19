@section('title','Cuota Mantenimiento')
@extends('base')
@section('menu')

<style>
  #form {
      margin: 1em;
  }
</style>

<form id="form" class="row g-3 needs-validation" method="POST" action="{{ route('formMantenimiento') }}">
    @csrf
    <h1>Servicio de Mantenimiento</h1>
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Concepto</label>
      <input type="text" name="concepto" class="form-control" id="concepto" value="{{ old('concepto') }}" placeholder="Concepto">
    {!! $errors->first('concepto','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Fecha emisión</label>
      <input type="text" name="fechaEmision" class="form-control" id="fechaEmision" value="{{ old('fechaEmision') }}" placeholder="Fecha Emisión">
      {!! $errors->first('fechaEmision','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
      <label for="validationCustomUsername" class="form-label">Importe</label>
        <input type="text" name="importe" class="form-control" id="importe" value="{{ old('importe') }}" placeholder="Importe" aria-describedby="inputGroupPrepend">
      {!! $errors->first('importe','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
      <label for="validationCustom03" class="form-label">Pagada</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="pagada" id="si" value="si" {{ old('pagada') == 'si' ? 'checked' : '' }}>
        <label class="form-check-label" for="flexRadioDefault1">
          Si
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="pagada" id="no" value="no" {{ old('pagada') == 'no' ? 'checked' : '' }}>
        <label class="form-check-label" for="flexRadioDefault2">
          No
        </label>
      </div>
      {!! $errors->first('pagada','<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Fecha de pago</label>
        <input type="date" name="fechaPago" class="form-control" id="fechaPago" value="{{ old('fechaPago') }}" placeholder="Fecha pago">
        {!! $errors->first('fechaPago','<span style=color:red>:message</span>') !!}
    </div>

      <div class="col-md-4">
        <label for="floatingTextarea2">Notas</label>
        <div class="form-floating">
          <textarea class="form-control" name="notas" placeholder="Deja un comentario aquí" id="floatingTextarea2">{{ old('notas') }}</textarea>
          {!! $errors->first('notas','<span style=color:red>:message</span>') !!}
        </div>
    </div>

    <div class="col-12">
      <button class="btn btn-success" type="submit">Almacenar cuota</button>
    </div>
  </form>
@endsection