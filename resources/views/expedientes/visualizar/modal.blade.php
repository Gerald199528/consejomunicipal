@include('expedientes.estado.estado')
@include('expedientes.importar.importar')
<style>
    .modal-content {
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-body {
        font-size: 1.1rem;
        padding: 20px;
    }

    .user-details p {
        margin: 10px 0;
    }

    .modal-footer {
        justify-content: space-between;
    }

    .modal-footer .btn {
        flex: 1;
        margin: 0 5px;
    }

    .modal.fade .modal-dialog {
        transform: translate(0, -25%);
    }

    .modal.show .modal-dialog {
        transform: translate(0, 0);
    }
</style>
<!-- Modal para mostrar detalles del usuario -->
<div class="modal fade" id="visualizarModal" tabindex="-1" role="dialog" aria-labelledby="visualizarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #26609e; color: white;">
                <h5 class="modal-title" id="visualizarModalLabel">Detalles del Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="userImagen" src="{{ isset($imagenExpediente) ? $imagenExpediente : asset('ruta/por/defecto/a/imagen.jpg') }}" alt="Imagen del usuario" class="img-fluid rounded-circle mb-3" style="max-width: 200px;">
                <p><strong>Nombres:</strong> <span id="usuarioNombres">{{ isset($nombreUsuario) ? $nombreUsuario : 'No disponible' }}</span></p>
                <p><strong>Apellido:</strong> <span id="usuarioapellido">{{ isset($apellidoUsuario) ? $apellidoUsuario : 'No disponible' }}</span></p>
                <p><strong>Cédula:</strong> <span id="usuarioCedula">{{ isset($cedulaUsuario) ? $cedulaUsuario : 'No disponible' }}</span></p>
                <p><strong>Correo:</strong> <span id="usuarioCorreo">{{ isset($correoUsuario) ? $correoUsuario : 'No disponible' }}</span></p>
                <p><strong>Teléfono:</strong> <span id="usuarioTelefono">{{ isset($telefonoUsuario) ? $telefonoUsuario : 'No disponible' }}</span></p>
                <p><strong>Estado:</strong> <span id="usuarioEstado">{{ isset($estadoUsuario) ? $estadoUsuario : 'No disponible' }}</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnModificar" onclick="modificarUsuario()">Modificar</button>
                <button type="button" class="btn btn-success" onclick="descargarExpediente()">Descargar</button>
                <button type="button" class="btn btn-primary" onclick="mostrarModalImportarDocumentos()">Importar Documentos</button>
                <button type="button" class="btn btn-warning" id="btnEstado" onclick="mostrarModalEstado()">Estado de Usuario</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Volver</button>
            </div>
        </div>
    </div>
</div>





<script>
 function verDetalles(id, imagen, nombres, apellido, correo, telefono, documento, estado, cedula) {
    expedienteId = id; // Almacena el ID del expediente
    documentoUrl = documento; // Almacena la URL del documento
    const imgElement = document.getElementById('userImagen');
    imgElement.src = imagen || 'ruta/por/defecto/a/imagen.jpg'; // Ruta por defecto si no hay imagen
    document.getElementById('usuarioNombres').innerText = nombres;
    document.getElementById('usuarioapellido').innerText = apellido;
    document.getElementById('usuarioCorreo').innerText = correo;
    document.getElementById('usuarioTelefono').innerText = telefono;
    document.getElementById('usuarioEstado').innerText = estado; // Asegúrate de tener este elemento en el modal
    document.getElementById('usuarioCedula').innerText = cedula; // Agrega esta línea para mostrar la cédula
    $('#visualizarModal').modal('show'); // Mostrar el modal
}

  function verDocumento() {
    console.log("ID del expediente:", expedienteId); // Verifica el ID en la consola
    if (expedienteId) {
        // Construye la URL para abrir el PDF
        const documentoUrl = `/documentos/${expedienteId}`; // Ajusta la ruta según tu configuración
        window.open(documentoUrl, '_blank'); // Abre el documento en una nueva pestaña
    } else {
        alert("No se pudo encontrar el documento del expediente.");
    }
}
  function modificarUsuario() {
    if (expedienteId) {
        // Redirigir a la página de edición del expediente
        window.location.href = '/expedientes/' + expedienteId + '/edit'; // Ajusta la ruta según tu configuración
    } else {
        alert("No se pudo encontrar el ID del expediente.");
    }
  }

  function descargarExpediente() {
    if (expedienteId) {
        // Redirigir a la ruta de descarga del expediente
        window.location.href = '/expedientes/' + expedienteId + '/download'; // Ajusta la ruta según tu configuración
    } else {
        alert("No se pudo encontrar el ID del expediente para descargar.");
    }
  }

  function mostrarModalEstado() {
    const form = document.getElementById('editStatusForm');
    form.action = '/users/' + expedienteId + '/update-status'; // Ajusta la ruta según tu configuración
    $('#estadoModal').modal('show'); // Mostrar el modal de estado
  }
  
  function mostrarModalEstado() {
    $('#visualizarModal').modal('hide'); // Ocultar el modal principal
    const form = document.getElementById('editStatusForm');
    form.action = '/users/' + expedienteId + '/update-status'; // Ajusta la ruta según tu configuración
    $('#estadoModal').modal('show'); // Mostrar el modal de estado
}


</script>
<script>
    function mostrarModalImportarDocumentos() {
        $('#visualizarModal').modal('hide'); // Ocultar el modal de detalles
        $('#importarDocumentosModal').modal('show'); // Mostrar el modal de importar documentos
    }
    
    // ... (el resto de tus funciones permanece igual)
</script>

<style>
    .modal-content {
        border-radius: 10px;
    }
    .modal-header {
        border-bottom: none;
    }
    .modal-body {
        font-size: 1.1rem;
    }
</style>

