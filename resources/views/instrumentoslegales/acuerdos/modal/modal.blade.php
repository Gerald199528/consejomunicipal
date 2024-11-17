<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estimado usuario, puedes importar tus archivos PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">             
                <h3 class="text-center mb-4">Importar Acuerdo</h3> <!-- Cambiado a Importar Acuerdo -->
                <form id="uploadForm" action="{{ route('acuerdos.store') }}" method="POST" enctype="multipart/form-data" class="mb-4"> <!-- Cambiado a acuerdos -->
                    @csrf
                    <div class="form-group">
                        <label for="acuerdo">Seleccionar Acuerdo:</label> <!-- Cambiado a Acuerdo -->
                        <input type="file" class="form-control" id="acuerdo" name="acuerdo" required> <!-- Cambiado a acuerdo -->
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