<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9"> <!-- Ajuste de escala -->
    <title>Modificar Expediente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo claro */
            font-family: Arial, sans-serif;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #09539c;
            margin-top: 20px;
        }
        .container {
            background-color: #ffffff; /* Fondo blanco para el contenedor */
            border-radius: 10px; /* Bordes redondeados */
            padding: 15px; /* Espaciado interno */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
            max-width: 600px; /* Ancho máximo ajustado */
            margin: auto; /* Centrar el contenedor */
        }
        table {
            width: 100%; /* Ancho completo */
            margin-top: 20px;
            border-radius: 10px; /* Bordes redondeados para la tabla */
            overflow: hidden; /* Para que los bordes redondeados se apliquen a las celdas */
        }
        th, td {
            padding: 10px; /* Espaciado interno de las celdas */
            text-align: left; /* Alinear el texto a la izquierda */
            border: 1px solid #dee2e6; /* Borde de las celdas */
        }
        th {
            background-color: #e9ecef; /* Fondo gris claro para los encabezados */
            color: #09539c; /* Color del texto */
        }
        .image-section {
            text-align: center;
            margin: 20px 0;
        }
        .image-section img {
            max-width: 40%; /* Imagen responsiva más pequeña */
            height: auto;
            border-radius: 10px; /* Bordes redondeados para la imagen */
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .btn-center {
            display: flex;
            justify-content: center;
            gap: 10px; /* Espacio entre los botones */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modificar Expediente</h1>
        <div class="image-section">
            <h2>Imagen del Expediente</h2>
            @if($expediente->imagen)
                <img src="{{ Storage::url($expediente->imagen) }}" alt="Imagen del Expediente">
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
        <!-- Botones centrados -->
        <div class="btn-center mt-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                Editar Expediente
            </button>
            <a href="{{ route('expedientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Expediente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('expedientes.update', $expediente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" value="{{ old('cedula', $expediente->cedula) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $expediente->telefono) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="numero_cuenta">Número de Cuenta</label>
                                <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" value="{{ old('numero_cuenta', $expediente->numero_cuenta) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso</label>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', $expediente->fecha_ingreso) }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Este documento es confidencial y está destinado únicamente para el uso de la persona o entidad a la que se dirige.</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>