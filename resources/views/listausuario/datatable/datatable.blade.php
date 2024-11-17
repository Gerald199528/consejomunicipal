<style>
    /* Estilo profesional para DataTable */
    #example {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }
    #example thead tr {
        background-color: #09539c;
        color: #ffffff;
        text-align: center;
        font-weight: bold;
    }
    #example th, #example td {
        padding: 12px 15px;
    }
    #example tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    #example tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    #example tbody tr:last-of-type {
        border-bottom: 2px solid #073869;
    }
    #example tbody tr:hover {
        background-color: #f1f1f1;
    }
    /* Centrar contenido de las celdas */
    #example td {
        text-align: center;
        vertical-align: middle;
    }
    /* Ajustar el ancho de las columnas */
    #example th:nth-child(1), #example td:nth-child(1) { width: 5%; }
    #example th:nth-child(2), #example td:nth-child(2) { width: 15%; }
    #example th:nth-child(3), #example td:nth-child(3) { width: 15%; }
    #example th:nth-child(4), #example td:nth-child(4) { width: 15%; }
    #example th:nth-child(5), #example td:nth-child(5) { width: 10%; }
    #example th:nth-child(6), #example td:nth-child(6) { width: 10%; }
    #example th:nth-child(7), #example td:nth-child(7) { width: 10%; }
    #example th:nth-child(8), #example td:nth-child(8) { width: 10%; }
</style>

<div class="card card-primary card-outline p-2">
    <div class="card-header">
        <h3 class="card-title">Listado de Usuarios</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Nivel de Acceso</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->nivel_de_acceso }}</td>
                        <td>
                            <span class="{{ $usuario->status ? 'text-success' : 'text-danger' }}">
                                {{ $usuario->status ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('listausuario.edit', $usuario->id) }}" class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('listausuario.destroy', $usuario->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>