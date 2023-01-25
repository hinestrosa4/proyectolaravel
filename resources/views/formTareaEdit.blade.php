@section('title', 'Editar Tarea')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>
    <form id="form" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation"
        action="{{ route('formTareaUpdate', $tarea) }}">
        @csrf
        @method('PUT')

        <h1>Editar Tarea {{ $tarea->id }}</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-4">
            <label for="cliente">Cliente</label>
            <select class="form-control" name="cliente" id="cliente">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->cif }}"
                        {{ old('cliente', $tarea->cliente) == $cliente->cif ? 'selected' : '' }}>
                        {{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="nombre">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control" id="nombre"
                value="{{ old('nombre', $tarea->nombre) }}" placeholder="Apellidos, Nombre">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono"
                value="{{ old('telefono', $tarea->telefono) }}" placeholder="Telefono">
            @error('telefono')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="correo">Correo electrónico</label>
            <input type="text" name="correo" class="form-control" id="correo"
                value="{{ old('correo', $tarea->correo) }}" placeholder="Correo">
            @error('correo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion', $tarea->descripcion) }}</textarea>
            @error('descripcion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion"
                value="{{ old('direccion', $tarea->direccion) }}" placeholder="Dirección de la tarea">
            @error('direccion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Población</label>
            <input type="text" name="poblacion" class="form-control" id="poblacion"
                value="{{ old('poblacion', $tarea->poblacion) }}" placeholder="Población">
            @error('poblacion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Código Postal</label>
            <input type="text" name="codigoPostal" class="form-control" id="codigoPostal"
                value="{{ old('codigoPostal', $tarea->codigoPostal) }}" placeholder="Código Postal">
            @error('codigoPostal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Provincia</label>
            <select class="form-select" name="provincia">
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->cod }}"
                        {{ old('provincia') == $provincia->cod ? 'selected' : ($tarea->provincia == $provincia->cod ? 'selected' : '') }}>
                        {{ $provincia->nombre }}</option>
                @endforeach
            </select>
            @error('provincia')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                <option value="P" {{ old('estado') == 'P' ? 'selected' : ($tarea->estado == 'P' ? 'selected' : '') }}>
                    Pendiente
                </option>
                <option value="R" {{ old('estado') == 'R' ? 'selected' : ($tarea->estado == 'R' ? 'selected' : '') }}>
                    Realizada
                </option>
                <option value="C" {{ old('estado') == 'C' ? 'selected' : ($tarea->estado == 'C' ? 'selected' : '') }}>
                    Cancelada
                </option>
            </select>
            @error('estado')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Operario encargado</label>
            <select class="form-select" name="operario">
                @foreach ($empleados as $empleado)
                    @if ($empleado->es_admin == 0)
                        <option value="{{ $empleado->nif }}"
                            {{ old('operario') == $empleado->nif ? 'selected' : ($tarea->operario == $empleado->nif ? 'selected' : '') }}>
                            {{ $empleado->nombre }}</option>
                    @endif
                @endforeach
            </select>
            @error('operario')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Fecha de realización</label>
            <input type="date" name="fechaRealizacion" class="form-control" id="fechaRealizacion"
                value="{{ old('fechaRealizacion', $tarea->fechaRealizacion), $tarea->fechaRealizacion }}"
                placeholder="fechaRealizacion">
            @error('fechaRealizacion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="floatingTextarea2">Anotaciones Anteriores</label>
            <div class="form-floating">
                <textarea class="form-control" name="anotacionesAnt" placeholder="Deja las anotaciones anteriores aquí"
                    id="floatingTextarea2">{{ old('anotacionesAnt') }}</textarea>
                @error('anotacionesAnt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="floatingTextarea2">Anotaciones Posteriores</label>
            <div class="form-floating">
                <textarea class="form-control" name="anotacionesPos" placeholder="Deja las anotaciones posteriores aquí"
                    id="floatingTextarea2">{{ old('anotacionesPos') }}</textarea>
                @error('anotacionesPos')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Fichero Resumen</label>
            <input type="file" name="ficheroResumen" class="form-control" id="ficheroResumen"
                value="{{ old('ficheroResumen') }}" placeholder="ficheroResumen">
            @error('ficheroResumen')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
        </div>
    </form>
    </div>
    </div>
@endsection
