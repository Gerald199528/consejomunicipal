@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('container')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="card card-primary card-outline card-custom p-2">
        <div class="container text-center">
            <h1>Datos de: {{ $usuario->name }} {{ $usuario->apellido }}</h1>
        </div>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-md-5"> <!-- Cambié a col-md-5 para que ambos formularios tengan el mismo tamaño -->
                        <!-- general form elements -->
                        <div class="card card-primary card-outline p-2">
                            <div class="card-header">
                                <h1 class="card-title"> <i class="fa-solid fa-user"></i>Datos</h1>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('listausuario.update', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Nombre:</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $usuario->name }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="apellido" class="form-label">Apellidos:</label>
                                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $usuario->apellido }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nivel_de_acceso" class="form-label">Selecciona nivel de acceso</label>
                                            <select class="form-select custom-select" id="nivel_de_acceso" name="nivel_de_acceso">
                                                <option value="administrador" {{ $usuario->nivel_de_acceso == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                                <option value="empleado" {{ $usuario->nivel_de_acceso == 'empleado' ? 'selected' : '' }}>Empleado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i> Actualizar Usuario
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5"> <!-- Cambié a col-md-5 para que ambos formularios tengan el mismo tamaño -->
                        <!-- general form elements -->
                        <div class="card card-primary  card-outline p-2">
                            <div class="card-header">
                                <h1 class="card-title"><i class="fa-solid fa-lock"></i> Nueva Contraseña</h1>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('listausuario.update', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Ingrese contraseña:</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Ingrese contraseña">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password_confirmation" class="form-label">Repite:</label>
                                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Repite contraseña">
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i> Actualizar Contraseña
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Botón para regresar a la página anterior -->
        <div class="text-center mt-4">
            <button onclick="window.history.back();" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </button>
        </div>
    </div>
</body>
</html>
@endsection