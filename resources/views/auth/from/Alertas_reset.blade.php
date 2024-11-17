<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('error'))
<script>
Swal.fire({
  icon: 'error',
  title: 'Error de autenticación',
  text: '{{ Session::get('error') }}',
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
});
</script>
@endif


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
  width: '700px',
  heightAuto: false
});
</script>
@endif





