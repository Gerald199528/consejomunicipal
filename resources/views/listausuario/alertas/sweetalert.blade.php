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
  
  
  
  
  
    
  
  
  
  