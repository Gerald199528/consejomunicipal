<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Expediente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-4">Formulario para Crear Expediente</h3>
                <form id="createExpedienteForm" action="{{ route('expedientes.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Expediente:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                  
                    <div class="form-group mt-3">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="expediente">Seleccionar Archivo PDF:</label>
                        <input type="file" class="form-control" id="expediente" name="expediente" accept=".pdf" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="user_id">Vincular con Usuario:</label>
                        <select class="form-control" id="user_id" name="user_id" required onchange="updateUserInfo()">
                            <option value="">Seleccione un usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" data-name="{{ $usuario->name }}" data-apellido="{{ $usuario->apellido }}" data-correo="{{ $usuario->email }}">{{ $usuario->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-4">
                            <label for="nombre_usuario">Nombre</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_usuario">Apellido:</label>
                            <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="correo_usuario">Correo:</label>
                            <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" readonly>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Crear Expediente </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateUserInfo() {
        const select = document.getElementById('user_id');
        const selectedOption = select.options[select.selectedIndex];
        document.getElementById('nombre_usuario').value = selectedOption.getAttribute('data-name') || '';
        document.getElementById('apellido_usuario').value = selectedOption.getAttribute('data-apellido') || '';
        document.getElementById('correo_usuario').value = selectedOption.getAttribute('data-correo') || '';
    }
</script>