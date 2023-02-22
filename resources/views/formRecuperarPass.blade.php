@section('title', 'Cambiar Contraseña')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

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

<form id="form" class="row g-3 needs-validation" method="POST" action="{{ route('recuperarPass') }}">
    @csrf
    <h1>Recuperar Contraseña</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <h3>Indique su correo</h3>

    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Correo Electrónico</label>
        <input type="text" name="correo" class="form-control" id="correo" value="{{ old('correo') }}"
            placeholder="correo">
        {!! $errors->first('correo', '<span style=color:red>:message</span>') !!}
    </div>

    <div class="col-12">
        <a href="/" class="btn btn-info" type="submit">Login</a>
        <button class="btn btn-success" type="submit">Enviar Correo 📧</button>
        
    </div>
</form>
