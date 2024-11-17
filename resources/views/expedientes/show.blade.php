
<!-- resources/views/expedientes/show.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #09539c; /* Fondo claro */
        }
        .container {
            margin-top: 100px;
            border-radius: 30px; /* Bordes redondeados para el contenedor */
            background-color: #ffffff; /* Fondo blanco para el contenedor */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para el contenedor */
            padding: 40px; /* Espaciado interno */
        }
        .table {
            border-radius: 30px; /* Bordes redondeados para la tabla */
            overflow: hidden; /* Para que los bordes redondeados se apliquen a las celdas */
        }
        th, td {
            border: 1px solid #dee6df; /* Borde de las celdas */
            border-radius: 10px; /* Bordes redondeados para las celdas */
        }
        th {
            background-color: #e9ecef; /* Fondo gris claro para los encabezados */
        }
        img {
            border-radius: 10px; /* Bordes redondeados para la imagen */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Detalles del Expediente</h1>
        <table class="table table-bordered">
            <tr>
                <th>N°</th>
                <td>{{ $expediente->id }}</td>
            </tr>
            <tr>
                <th>Nombres</th>
                <td>{{ $expediente->user ? $expediente->user->name : 'No asignado' }}</td>
            </tr>
            <tr>
                <th>Apellidos</th>
                <td>{{ $expediente->user ? $expediente->user->apellido : 'No asignado' }}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{ $correoUsuario }}</td>
            </tr>
            <tr>
                <th>Cédula</th>
                <td>{{ $expediente->cedula }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $expediente->telefono }}</td>
            </tr>
            <tr>
                <th>Número de Cuenta</th>
                <td>{{ $expediente->numero_cuenta }}</td>
            </tr>
            <tr>
                <th>Fecha de Ingreso</th>
                <td>{{ $expediente->fecha_ingreso }}</td>
            </tr>
            <tr>
                <th>Imagen</th>
                <td>
                    @if($expediente->imagen)
                        <img src="{{ Storage::url($expediente->imagen) }}" alt="Imagen del Expediente" style="max-width: 200px;">
                    @else
                        No hay imagen disponible.
                    @endif
                </td>
            </tr>
        </table>
        <a href="{{ route('expedientes.index') }}" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>