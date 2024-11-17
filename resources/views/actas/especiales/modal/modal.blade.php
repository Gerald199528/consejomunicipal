<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Importación de Archivos PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-4">Importar Especiales</h3>
                <form id="uploadForm" action="{{ route('especiales.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="especiales">Seleccionar Archivo Especiales:</label>
                        <input type="file" class="form-control" id="especiales" name="especiales" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_sesion">Fecha de Sesión:</label>
                        <input type="date" class="form-control" id="fecha_sesion" name="fecha_sesion" required>
                    </div>
                    <div class="modal-footer justify-content-center mt-4">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-upload"></i> Importar </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
