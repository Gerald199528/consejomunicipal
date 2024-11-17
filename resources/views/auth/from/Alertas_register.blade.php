
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($errors->any())
    <script>
        let errorMessage = '';
        @foreach ($errors->all() as $error)
            errorMessage += '• {{ $error }}\n'; // Agregar un punto antes de cada mensaje de error
        @endforeach

        Swal.fire({
            icon: 'error',
            title: 'Errores de validación',
            html: errorMessage, // Usar html en lugar de text para renderizar los saltos de línea
            showConfirmButton: true,
            timer: 20000,
            timerProgressBar: true,
            confirmButtonColor: '#6E0EE9',
            confirmButtonText: 'Ok',
            customClass: {
                popup: 'my-popup-class',
            },
            width: '700px', // Ajustar el ancho del cuadro de diálogo
            heightAuto: false, // Desactivar la altura automática para establecer una altura fija
        });
    </script>
@endif