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
    #example th:nth-child(6), #example td:nth-child(6) { width: 15%; }
    #example th:nth-child(7), #example td:nth-child(7) { width: 15%; }
    #example th:nth-child(8), #example td:nth-child(8) { width: 10%; } /* Nueva columna para Fecha de Egreso */
</style>

<div class="card card-primary card-outline p-2">
    <div class="card-header">
        <h3 class="card-title">Lista de Usuarios</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Motivo del Retiro</th>
                    <th>Fecha de Egreso</th> <!-- Nueva columna -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="{{ $user->status ? 'text-success' : 'text-danger' }}">
                                {{ $user->status ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>{{ $user->motivo }}</td>
                        <td>{{ $user->fecha_egreso }}</td> <!-- Nueva celda para Fecha de Egreso -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>