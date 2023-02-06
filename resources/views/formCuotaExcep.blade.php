@section('title', 'Cuota Mantenimiento')
@extends('base')
@section('menu')

    <style>
        #form {
            margin: 1em;
        }
    </style>

@section('elshisha')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#form-select').select2();
        });
    </script>

@endsection

<form id="form" class="row g-3 needs-validation" method="POST" action="{{ route('formCuotaExcep') }}">
    @csrf
    <h1>Cuota Excepcional</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="form-group" style="width: 400px">
        <label class="form-label">Cliente: </label>
        <select class="form-control" id="form-select" name="clientes_id">
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('clientes_id') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Concepto</label>
        <input type="text" name="concepto" class="form-control" id="concepto" value="{{ old('concepto') }}"
            placeholder="Concepto">
        {!! $errors->first('concepto', '<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Fecha emisión</label>
        <input type="date" name="fechaEmision" class="form-control" id="fechaEmision"
            value="{{ old('fechaEmision') }}" placeholder="Fecha Emisión">
        {!! $errors->first('fechaEmision', '<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Importe</label>
        <input type="number" name="importe" class="form-control" id="importe" value="{{ old('importe') }}"
            placeholder="Importe" aria-describedby="inputGroupPrepend">
        {!! $errors->first('importe', '<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-md-4">
        <label for="floatingTextarea2">Notas</label>
        <div class="form-floating">
            <textarea class="form-control" name="notas" placeholder="Deja un comentario aquí" id="floatingTextarea2">{{ old('notas') }}</textarea>
            {!! $errors->first('notas', '<span style=color:red>:message</span>') !!}
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-success" type="submit">Almacenar Cuota Excepcional</button>
    </div>
</form>
@endsection
