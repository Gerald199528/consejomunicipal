<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Imagen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
                <form id="upload-form" action="{{ route('miuser.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="my-dropzone" class="dropzone"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" form="upload-form">
                    <i class="fa-solid fa-pen-to-square"></i> Actualizar Usuario
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;
    const dropzone = new Dropzone("#my-dropzone", {
        url: "{{ route('miuser.store') }}",
        maxFilesize: 2, // Tamaño máximo del archivo en MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif", // Tipos de archivos permitidos
        maxFiles: 1, // Permitir solo una imagen
        addRemoveLinks: false, // No mostrar enlaces para eliminar archivos
        dictDefaultMessage: "Arrastra los archivos aquí para subirlos, o haz clic para seleccionar una imagen",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            console.log(response);
        },
        init: function() {
            this.on("addedfile", function(file) {
                // Botón de eliminación personalizado
                let removeButton = Dropzone.createElement("<button class='btn btn-danger btn-sm'>Eliminar</button>");

                // Agregar evento para eliminar archivo al hacer clic
                removeButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Eliminar archivo desde Dropzone
                    dropzone.removeFile(file);
                });

                // Añadir el botón al archivo cargado
                file.previewElement.appendChild(removeButton);

                // Remover cualquier archivo previamente cargado
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    });
</script>

