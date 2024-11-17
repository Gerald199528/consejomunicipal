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
    #example th:nth-child(1), #example td:nth-child(1) {
        width: 5%; /* Ancho para el número */
    }
    #example th:nth-child(2), #example td:nth-child(2) {
        width: 30%; /* Ancho para el nombre */
    }
    #example th:nth-child(3), #example td:nth-child(3) {
        width: 20%; /* Ancho para la fecha */
    }
    #example th:nth-child(4), #example td:nth-child(4),
    #example th:nth-child(5), #example td:nth-child(5),
    #example th:nth-child(6), #example td:nth-child(6),
    #example th:nth-child(7), #example td:nth-child(7) {
        width: 10%; /* Ancho para los botones */
    }
</style>
<div class="card card-primary card-outline p-2">
    <div class="card-header">
        <h3 class="card-title">Resoluciones</h3> <!-- Agregar un título a la tarjeta -->
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered center-table" style="width:100%">
            <thead>        
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Fecha</th>     
                    <th>Visualizar</th>
                    <th>Imprimir</th>
                    <th>Descargar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resoluciones as $resolucion) <!-- Cambiado de $ordenanzas a $resoluciones -->
                    <tr>
                        <td>{{ $resolucion->id }}</td> <!-- Cambiado de $ordenanza a $resolucion -->
                        <td>{{ $resolucion->nombre }}</td> <!-- Cambiado de $ordenanza a $resolucion -->
                        <td>{{ $resolucion->fecha_importacion }}</td> <!-- Cambiado de $ordenanza a $resolucion -->
                        <td>
                            <a href="{{ Storage::url('public/' . $resolucion->ruta) }}" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i> </a>                                  
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" onclick="printPDF('{{ Storage::url('public/' . $resolucion->ruta) }}')">
                                <i class="fas fa-print"></i> 
                            </button>
                        </td>
                        <td>  
                            <a href="{{ route('resoluciones.download', $resolucion->nombre) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-file-pdf"></i> </a> <!-- Cambiado de ordenanzas a resoluciones -->
                        </td>
                        <td>
                            <form action="{{ route('resoluciones.destroy', $resolucion->nombre) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)"> <!-- Cambiado de ordenanzas a resoluciones -->
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="resolucion_id" value="{{ $resolucion->id }}"> <!-- Campo oculto con id -->
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> <span class="icon-text"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>