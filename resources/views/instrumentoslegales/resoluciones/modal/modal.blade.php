<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estimado usuario, puedes importar tus archivos PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">             
                <h3 class="text-center mb-4">Importar Resolución</h3>
                <form id="uploadForm" action="{{ route('resoluciones.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="resolucion">Seleccionar Resolución:</label>
                        <input type="file" class="form-control" id="resolucion" name="resolucion" required>                   
                    </div>        
                    <div class="modal-footer justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-upload"></i> Importar </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> Cancelar</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>