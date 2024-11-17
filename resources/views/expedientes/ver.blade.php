blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente - {{ $expediente->nombre }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Fondo claro */
            color: #333;
            font-size: 14px; /* Tamaño de fuente reducido */
            display: flex; /* Usar flexbox */
            flex-direction: column; /* Apilar elementos verticalmente */
            justify-content: center; /* Centrar verticalmente */
            align-items: center; /* Centrar horizontalmente */
            height: 100vh; /* Altura completa de la ventana */
        }
        h1 {
            text-align: center;
            color: #09539c;
            margin-top: 20px;
        }
        .container {
            background-color: #ffffff; /* Fondo blanco para el contenedor */
            border-radius: 15px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
            max-width: 800px; /* Ancho máximo ajustado */
            margin: auto; /* Centrar el contenedor */
        }
        table {
            width: 100%; /* Ancho completo */
            margin-top: 20px;
            border-radius: 10px; /* Bordes redondeados para la tabla */
            overflow: hidden; /* Para que los bordes redondeados se vean bien */
            border-collapse: collapse;
            border: 1px solid #dee2e6; /* Borde para la tabla */
        }
        th, td {
            padding: 15px; /* Reducir el padding para hacer el formulario más pequeño */
            text-align: left; /* Alinear el texto a la izquierda */
            border: 1px solid #dddddd; /* Borde de las celdas */
        }
        th {
            background-color: #e9ecef; /* Fondo gris claro para los encabezados */
            color: #09539c; /* Color del texto del encabezado */
            font-weight: bold;
        }
        .image-section {
            text-align: center;
            margin: 20px 0;
        }
        .image-section img {
            max-width: 50%; /* Imagen responsiva */
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px; /* Bordes redondeados para la imagen */
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles del Expediente</h1>
        <div class="image-section">
            <h2>Imagen del Expediente</h2>
            @if($expediente->imagen)
                <img src="{{ public_path('storage/' . $expediente->imagen) }}" alt="Imagen del Expediente">
            @else
                <p>No hay imagen disponible.</p>
            @endif
        </div>
        <table>
            <tr>
                <th>N°</th>
                <td>{{ $expediente->id }}</td>
            </tr>
            <tr>
                <th>Usuario Vinculado</th>
                <td>{{ $expediente->user ? $expediente->user->email : 'No asignado' }}</td>
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
                <th>Curriculum</th>
                <td>{{ $expediente->archivo ? 'Sí' : 'No' }}</td>
            </tr>
        </table>
        <div class="footer">
            <p>Este documento es confidencial y está destinado únicamente para el uso de la persona o entidad a la que se dirige.</p>
        </div>
    </div>
</body>
</html>