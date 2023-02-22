<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Nosecaen S.L.</title>
</head>

<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-3">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Log In</h3>

                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg"
                                        placeholder="Correo" name="email" />
                                    <label class="form-label" for="typeEmailX-2">Correo</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                                        placeholder="Clave" name="password" />
                                    <label class="form-label" for="typePasswordX-2">Clave</label>
                                </div>

                                {{-- <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                                </div> --}}

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                <br><br>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                    <p>¿Desea insertar una incidencia? <a href="{{ route('formIncidenciaCliente') }}">Pincha aquí</a></p>
                                    <p>¿Has olvidado la contraseña? <a href="{{ route('formRecuperarPass') }}">Recuperar contraseña</a></p>

                                <hr class="my-4">

                                <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                    type="submit">Sign in with Google<i class="bi bi-google"></i></button>
                                <button class="btn btn-lg btn-block btn-primary" style="background-color: #181818;"
                                    type="submit">Sign in with GitHub<i class="bi bi-github"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>
