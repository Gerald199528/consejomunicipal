<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile text-center">
                @if($imagens->isNotEmpty())
                    <img class="profile-user-img img-fluid img-circle mb-3"
                         src="{{ $imagens->first()->url }}"
                         alt="User profile picture"
                         style="width: 200px; height: 200px;">
                @endif
                <h3 class="profile-username">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</h3>
                <p class="text-muted">{{ auth()->user()->nivel_de_acceso }}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Subir imagen
                </button>
                @include('miuser.modal.cargar_imagen')
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-primary card-outline p-2">
            <div class="card-header">
                <h5 class="card-title"><i class="fa-solid fa-user"></i> Cambiar Contraseña</h5>
            </div>
            @if ($errors->any())
            @foreach ( $errors->all() as $error)
            <span class="alert alert-danger">{{$error}}</span>                 
            @endforeach
        @endif

        @if(session('repeatPassword'))
        <div class="alert alert-danger" role="alert">
        {{session('repeatPassword') }}
        </div>
        @endif
        @if(session('notification'))
        <div class="alert alert-success" role="alert">
        {{session('notification') }}
        </div>
        @endif



            <div class="card-body">
                <form action="{{ route('cambiar.contraseña') }}" method="POST">
                    @csrf

                    
                    <div class="form-group mb-2">
                        <label for="current_password" class="form-label">Contraseña Actual:</label>
                        <div class="input-group">
                            <input type="password"  id="current_password" class="form-control" name="current_password" placeholder="Ingrese contraseña actual" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye" id="eyePassword"></i>
                                </span>
                            </div>
                        </div>a
                    </div>
                    <div class="form-group mb-2">
                        <label for="new_password" class="form-label">Nueva Contraseña:</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" name="password" placeholder="Ingrese nueva contraseña" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="toggleNewPassword" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye" id="eyeNewPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="new_password_confirmation" class="form-label">Repite Contraseña:</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Repite nueva contraseña" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye" id="eyeConfirmPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-pen-to-square"></i> Actualizar Contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const togglePasswordVisibility = (toggleButtonId, passwordFieldId) => {
        const toggleButton = document.getElementById(toggleButtonId);
        const passwordField = document.getElementById(passwordFieldId);
        const icon = toggleButton.querySelector('i');
        toggleButton.addEventListener('click', () => {
            const isPassword = passwordField.type === "current_password";
            passwordField.type = isPassword ? "text" : "current_password";
            icon.classList.toggle('fa-eye', isPassword);
            icon.classList.toggle('fa-eye-slash', !isPassword);
        });
    };

    // Asignar la función a cada campo
    togglePasswordVisibility('togglePassword', 'current_password');
    togglePasswordVisibility('toggleNewPassword', 'password');
    togglePasswordVisibility('toggleConfirmPassword', 'password_confirmation');
</script>