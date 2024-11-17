
@include('auth.from.Alertas_register')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa-solid fa-user">  </i>     <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('listausuario.store') }}" method="POST" class="row g-3" onsubmit="validatePasswords(event)">
                    @csrf
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo "Email"</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nivel_de_acceso" class="form-label">Selecciona nivel de acceso</label>
                        <select class="form-select custom-select" id="nivel_de_acceso" name="nivel_de_acceso" required>
                            <option value="" disabled selected>Selecciona nivel de acceso</option>
                            <option value="administrador">Administrador</option>
                            <option value="empleado">Empleado</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Ingrese Contraseña</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Ingresa contraseña" required maxlength="10">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirma Contraseña</label>
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Repita contraseña" required maxlength="10">
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary me-3">
                            <i class="fa-solid fa-floppy-disk icono"></i> Registrar
                        </button><br>
                        <button type="button" class="btn btn-secondary ms-3" data-bs-dismiss="modal">
                            <i class="fa-solid fa-ban icono"></i> Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>