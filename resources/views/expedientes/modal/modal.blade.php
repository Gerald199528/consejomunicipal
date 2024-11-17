<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Expediente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-4">Formulario de Expediente</h3>
                <form id="createExpedienteForm" action="{{ route('expedientes.store') }}" method="POST" enctype="multipart/form-data" class="mb-4" onsubmit="return validateForm()">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="user_id">Vincular con Usuario:</label>
                            <select class="form-select" id="user_id" name="user_id" required onchange="updateUserInfo()"> 
                                <option value="">Seleccione un usuario</option> 
                                @foreach($usuarios as $usuario)
                                 <option value="{{ $usuario->id }}" data-name="{{ $usuario->name }}"
                                     data-apellido="{{ $usuario->apellido }}" 
                                     data-correo="{{ $usuario->email }}"> {{ $usuario->id }} - {{ $usuario->name }}
                                      {{ $usuario->apellido }} 
                                    </option>
                                 @endforeach 
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nombre_usuario">Nombres</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_usuario">Apellidos</label>
                            <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="correo_usuario">Correo:</label>
                            <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="cedula">Cédula de identidad:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">V-</span>
                                <input type="text" class="form-control" placeholder="Ingrese Cédula" name="cedula" id="cedula" aria-label="Username" aria-describedby="addon-wrapping" maxlength="8" required pattern="\d{6,8}">
                                <div class="invalid-feedback">La cédula debe contener entre 6 y 8 dígitos.</div>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <label for="telefono">Teléfono:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">+58</span>
                                <input type="number" class="form-control" placeholder="Ingrese Teléfono" name="telefono" id="numero_telefono" maxlength="10" required oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);">
                                <div class="invalid-feedback">El teléfono debe contener 10 dígitos.</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="numero_cuenta">Número de Cuenta:</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Seleccione
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0105', 'Banco Mercantil')">0105 - Banco Mercantil</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0102', 'Banco de Venezuela')">0102 - Banco de Venezuela</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0108', 'Banco Provincial')">0108 - Banco Provincial</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0120', 'Banesco')">0120 - Banesco</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0125', 'Banco Nacional de Crédito')">0125 - Banco Nacional de Crédito</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0130', 'Banco Bicentenario')">0130 - Banco Bicentenario</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0160', 'Banco del Tesoro')">0160 - Banco del Tesoro</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0180', 'Banco Fondo Común')">0180 - Banco Fondo Común</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0185', 'Banco Venezolano de Crédito')">0185 - Banco Venezolano de Crédito</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectBank('0190', 'Banco de Comercio Exterior')">0190 - Banco de Comercio Exterior</a></li>     
                                </ul>
                                <input type="text" id="numero_cuenta" name="numero_cuenta" class="form-control" placeholder="Ingrese número de cuenta" maxlength="20" required pattern="\d{1,20}">
                            </div>
                            <div class="invalid-feedback">El número de cuenta debe contener entre 1 y 20 dígitos.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_ingreso">Fecha de Ingreso:</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                        </div>
                        <div class="col-md-6">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label for="expediente">Curriculum:</label>
                            <input type="file" class="form-control" id="expediente" name="expediente" accept=".pdf" required>
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

function selectBank(code, bankName) {
    // Actualiza el campo de número de cuenta con el código seleccionado
    document.getElementById('numero_cuenta').value = code;
    // También puedes mostrar el nombre del banco si lo deseas, por ejemplo:
    // alert('Banco seleccionado: ' + bankName);
}

function validateForm() {
    let isValid = true;
    // Validar cédula
    const cedula = document.getElementById('cedula').value;
    if (!/^\d{6,8}$/.test(cedula)) {
        isValid = false;
        alert("La cédula debe contener entre 6 y 8 dígitos.");
    }
    // Validar teléfono
    const telefono = document.getElementById('telefono').value;
    if (!/^\d{10}$/.test(telefono)) {
        isValid = false;
        alert("El teléfono debe contener 10 dígitos.");
    }
    // Validar número de cuenta
    const numeroCuenta = document.getElementById('numero_cuenta').value;
    if (!/^\d{1,20}$/.test(numeroCuenta)) {
        isValid = false;
        alert("El número de cuenta debe contener entre 1 y 20 dígitos.");
    }
    return isValid;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>