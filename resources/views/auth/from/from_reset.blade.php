<!doctype html>
<html lang="es">
<head>
    <title>Restablecer Contraseña</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body {
            background-color: #0e5faf; /* Color de fondo */
            margin: 0; /* Elimina márgenes del body */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ocupa toda la altura de la ventana */
        }
        .form-container {
            background-color: rgb(250, 243, 243); /* Fondo del formulario */
            padding: 1.5rem; /* Espaciado interno reducido */
            border-radius: 0.25rem; /* Bordes menos redondeados */
            box-shadow: none; /* Sin sombra */
            width: 100%;
            max-width: 400px; /* Ancho máximo aumentado */
        }
        .alert {
            font-size: 0.9rem; /* Tamaño de fuente más pequeño para la alerta */
        }
    </style>
</head>
<body>
    <form method="post" action="{{ route('reset.post') }}" class="form-container">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @include('auth.from.Alertas_reset')
        <h5 class="text-center mb-3">Restablecer Contraseña</h5>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Ingrese su correo" required>
        </div>
        <div class="alert alert-danger" role="alert">
            Para recuperar su contraseña, ingrese su dirección de correo electrónico. Recibirá un enlace para restablecerla.
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}" class="btn btn-secondary">Atrás</a>
            <button type="submit" class="btn" style="background-color:  #0e5faf; color: white;">Enviar</button>
        </div>
    </form>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>