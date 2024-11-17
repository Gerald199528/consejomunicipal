<!doctype html>
<html lang="es">
<head>
    <title>Reiniciar Contraseña</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{!! asset('Estilos_login/css/login.css') !!}">
    <link rel="stylesheet" href="{!! asset('build/assets/app-c22a5d79.css') !!}">
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo de la página */
        }
        .form-container {
            background-color: white; /* Fondo blanco para el formulario */
            padding: 2rem; /* Espaciado interno */
            border-radius: 0.5rem; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="form-container col-md-4"> <!-- Cambié el tamaño del contenedor -->
            <h1 class="text-center mb-4">¡Olvido su contraseña!</h1>
            <div class="card bg-glass">
                <div class="card-body">
                    @include('auth.from.from_reset')
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>