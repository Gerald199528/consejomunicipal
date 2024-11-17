<!doctype html>
<html lang="es">
<head>
    <title>Registro</title>
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
        .nombre-apellido {
            display: flex;
            gap: 10px; /* Ajusta el valor según tus necesidades */
        }
        .form-label {
            color: #000; /* Color oscuro para resaltar */
            font-weight: bold; /* Opcional: para hacer el texto más grueso */
        }
        .password-fields {
            display: flex;
            gap: 10px; /* Ajusta el valor según tus necesidades */
        }
        .input-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 15px; /* Ajusta la posición del ícono a la derecha */
            top: 50%; /* Centrado vertical */
            transform: translateY(-50%); /* Centrado vertical */
            cursor: pointer;
            color: #000; /* Color del ícono en negro */
            font-size: 1.2em; /* Tamaño del ícono */
            z-index: 1; /* Asegura que el ícono esté por encima del campo de entrada */
        }
      
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #125496;
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right,  #0d3a66,  #125496, #125496, #0f3458);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right,  #1166bb,   #07213b,  #1166bb,     #082b4e);
        }
    </style>
</head>
<body>
    <section class="h-100 gradient-form gradient-custom-2" style="background-color: #125496">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-8"> <!-- Cambié el tamaño de la columna para centrar mejor -->
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-12"> <!-- Cambié el tamaño de la columna a 12 -->
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{ asset('img/logo.png') }}" style="max-width: 40%; height: auto;">
                                        <br>
                                        <h4 class="mt-1 mb-8 pb-1">Registro de Usuario</h4>
                                    </div>
                                    @include('auth.from.from_register')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>