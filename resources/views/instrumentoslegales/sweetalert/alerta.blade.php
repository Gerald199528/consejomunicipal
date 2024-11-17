
<!---------------------Editar usuario--------------------------->
@if(Session::has('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Éxito',
    text: '{{ Session::get('success') }}',
    showConfirmButton: true,
    timer: 20000,
    timerProgressBar: true,
    confirmButtonColor: '#6E0EE9',
    confirmButtonText: 'Ok',
    customClass: {
        popup: 'larger-alert'
    },
    width: '600px',
    heightAuto: false
}).then(() => {
    // Limpiar la sesión después de mostrar la alerta
    @php
        Session::forget('success');
    @endphp
});
</script>
@endif
<!------------------------------------------------>
<!----------------------Eliminar-------------------------->
<script>
function confirmDelete(event) {
    event.preventDefault(); // Prevenir el envío del formulario
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, ¡elimínalo!"
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit(); // Enviar el formulario si se confirma
        }
    });
}
</script> 
<!------------------------------------------------>
<script>
function validatePasswords(event) {
    event.preventDefault(); // Prevenir el envío del formulario
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;
    if (password !== passwordConfirmation) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Las contraseñas no coinciden.',
            showConfirmButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ok',
            width: '600px',
            heightAuto: false
        });
    } else {
        event.target.submit(); // Enviar el formulario si las contraseñas coinciden
    }
}
</script>
<script>
function printPDF(url) {
    // Crea un nuevo iframe para cargar el PDF
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none'; // Oculta el iframe
    document.body.appendChild(iframe);
    
    // Establece la URL del PDF
    iframe.src = url;

    // Espera a que el iframe cargue el PDF
    iframe.onload = function() {
        // Llama a la función de impresión
        iframe.contentWindow.print();
        // Elimina el iframe después de imprimir
        document.body.removeChild(iframe);
    };
}
</script>