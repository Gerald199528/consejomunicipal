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
        <h3 class="card-title">Expedientes</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>        
                <tr>
                    <th>N°</th>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expedientes as $expediente)
                    <tr>
                        <td>{{ $expediente->id }}</td>
                        <td>{{ $expediente->cedula }}</td>
                        <td>{{ $expediente->user ? $expediente->user->name : 'No asignado' }}</td> 
                        <td>{{ $expediente->user ? $expediente->user->apellido : 'No asignado' }}</td> 
                        <td>
                            @if($expediente->user)
                                <span class="{{ $expediente->user->status ? 'text-success' : 'text-danger' }}">
                                    {{ $expediente->user->status ? 'Activo' : 'Inactivo' }}
                                </span>
                            @else
                                No asignado
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('expedientes.generatePDF', $expediente->id) }}" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="verDetalles('{{ $expediente->id }}', '{{ $expediente->imagen ? asset('storage/' . $expediente->imagen) : '' }}', '{{ $expediente->user->name }}', '{{ $expediente->user->apellido }}', '{{ $expediente->user->email }}', '{{ $expediente->user->telefono }}', '{{ asset('ruta/al/documento/' . $expediente->documento) }}', '{{ $expediente->user->status ? 'Activo' : 'Inactivo' }}')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('expedientes.destroy', $expediente->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
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
