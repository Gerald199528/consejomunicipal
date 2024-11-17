<!-- Modal para importar documentos -->
<div class="modal fade" id="importarDocumentosModal" tabindex="-1" role="dialog" aria-labelledby="importarDocumentosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #26609e; color: white;">
                <h5 class="modal-title" id="importarDocumentosModalLabel">Importar Documentos</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form id="importarDocumentosForm" action="{{ route('documentos.importar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="documentos">Selecciona los documentos a importar</label>
                        <input type="file" class="form-control-file" id="documentos" name="documentos[]" multiple required>
                        <small class="form-text text-muted">Puedes cargar varios archivos a la vez.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Importar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Volver</button>
                </form>

                <hr>

                <h5 class="mt-4">Documentos Importados</h5>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Nombre del Documento</th>
                            <th>Fecha de Importación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documentosImportados as $documento)
                        <tr>
                            <td>{{ $documento->nombre }}</td>
                            <td>{{ $documento->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $documento->ruta) }}" class="btn btn-info btn-sm" target="_blank">Ver</a>
                                <form action="{{ route('documentos.eliminar', $documento->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarModalImportarDocumentos() {
        $('#importarDocumentosModal').modal('show'); // Mostrar el modal de importar documentos
    }
</script>