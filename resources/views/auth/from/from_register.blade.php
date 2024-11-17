<style>
    .nombre-apellido {
        display: flex;
        gap: 10px; /* Ajusta el valor según tus necesidades */
    }
    .form-label {
        color: #000; /* Color oscuro para resaltar */
        font-weight: bold; /* Opcional: para hacer el texto más grueso */
    }
    .password-fields {
        display: flex;
        gap: 10px; /* Ajusta el valor según tus necesidades */
    }
    .input-container {
        position: relative;
    }
    .toggle-password {
        position: absolute;
        right: 15px; /* Ajusta la posición del ícono a la derecha */
        top: 70%; /* Centrado vertical */
        transform: translateY(-50%); /* Centrado vertical */
        cursor: pointer;
        color: #1a1717;
        font-size: 1.2em; /* Tamaño del ícono */
        z-index: 1; /* Asegura que el ícono esté por encima del campo de entrada */
    }
    .form-control {
        padding-right: 40px; /* Espacio para el ícono */
    }
</style>

<form method="POST" action="/register" class="p-4 shadow-lg bg-light rounded">
    @include('auth.from.Alertas_register')
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-outline mb-4">
        <label for="email" class="form-label">Ingrese Email</label>
        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email@ address" required autofocus>
    </div>
    <div class="nombre-apellido">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nombres</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombres" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="apellido" class="form-label">Apellidos</label>
            <input type="text" id="apellido" class="form-control" name="apellido" value="{{ old('apellido') }}" placeholder="Apellidos" required>
        </div>
    </div>
    <div class="password-fields">
        <div class="col-md-6 mb-3 input-container">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Ingresa contraseña" required maxlength="10">
            <i class="fas fa-eye toggle-password" id="togglePassword" onclick="togglePasswordVisibility('password', this)"></i>
        </div>
        <div class="col-md-6 mb-3 input-container">
            <label for="password_confirmation" class="form-label">Repite Contraseña</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Repita contraseña" required maxlength="10">
            <i class="fas fa-eye toggle-password" id="togglePasswordConfirmation" onclick="togglePasswordVisibility('password_confirmation', this)"></i>
        </div>
    </div>
    <div class="alert alert-danger" role="alert">
        Estimado usuario, la contraseña debe poseer 10 caracteres, con al menos 1 número, una letra "Mayúscula" y un símbolo permitido '#$/*.@'
    </div>
    <div class="text-center">
        <style>
            .btn-custom {
                background-color: #0e5faf; /* Color de fondo */
                color: white; /* Color del texto */
                border-radius: 25px; /* Bordes redondeados */
                padding: 10px 20px; /* Espaciado interno */
                transition: background-color 0.3s, transform 0.3s; /* Transiciones suaves */
            }
            .btn-custom:hover {
                background-color: #1875d3; /* Color de fondo al pasar el mouse */
                transform: scale(1.05); /* Efecto de aumento al pasar el mouse */
            }
        </style>
        <button type="submit" class="btn btn-custom">Registrarser</button>
    
    </div>
    <br>
    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
</form>





<script>
    function togglePasswordVisibility(inputId, icon) {
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        icon.classList.toggle('fa-eye-slash');
    }
</script>