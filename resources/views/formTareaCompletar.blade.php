@section('title', 'Completar Tarea')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>
    <form id="form" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation"
        action="{{ route('formTareaUpdateCompletar', $tarea) }}">
        @csrf
        @method('PUT')

        <h1>Completar Tarea {{ $tarea->id }}</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


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
            <label for="floatingTextarea2">Anotaciones Anteriores</label>
            <div class="form-floating">
                <textarea class="form-control" name="anotacionesAnt" placeholder="Deja las anotaciones anteriores aquí"
                    id="floatingTextarea2">{{ old('anotacionesAnt') ?? $tarea->anotacionesAnt }}</textarea>
                @error('anotacionesAnt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="floatingTextarea2">Anotaciones Posteriores</label>
            <div class="form-floating">
                <textarea class="form-control" name="anotacionesPos" placeholder="Deja las anotaciones posteriores aquí"
                    id="floatingTextarea2">{{ old('anotacionesPos') ?? $tarea->anotacionesPos }}</textarea>
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
            <a  href="{{ Auth::check() && Auth::user()->es_admin === 1 ? route('listaTareas') : route('listaTareasOperario') }}" class="btn btn-secondary" id="cancel-btn">Cancelar</a>
            <button type="submit" class="btn btn-primary">Completar Tarea</button>
        </div>
    </form>
    </div>
    </div>
@endsection
