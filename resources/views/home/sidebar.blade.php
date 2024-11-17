 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img  src="{{ asset('img/logo.png') }}"  class="brand-image img-circle elevation-3" >
      <span class="brand-text font-weight-light">CONCEJO MUNICIPAL</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <img  class="img-circle elevation-2" alt="User Image">
  
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
     

              <li class="nav-item">
                <a href="{{route('home')}}"  class="nav-link">
                  <i class="nav-icon fas fa-home"></i>    
                  <p>
                    <p>  Home</p>
               
                  </p>
                </a> 

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>   
              <p>
                <p>Usuarios</p>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  href="{{route('listausuario.index')}}"  class="nav-link">
                  <i class="fa-solid fa-user"></i>
                  <p>Lista de Usuarios</p>
                </a>         
              </li>
              <li class="nav-item">
                <a  href="{{route('miuser.index')}}"  class="nav-link">
                  <i class="fa-solid fa-user"></i>
                  <p> Mi Usuario</p>
                </a>         
              </li>             
          </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-regular fa-folder-open"></i>
              <p>
                         Instrumentos Legales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>  
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a  href="{{route('ordenanzas.index')}}"  class="nav-link">
                  <i class="fas fa-file-pdf"></i>
                  <p>Ordenanzas</p>
                </a>         
              </li>
              <li class="nav-item">
                <a  href="{{route('gasetas.index')}}"  class="nav-link">
                  <i class="fas fa-file-pdf"></i>
                  <p>Gacetas</p>
                </a>         
              </li>
              <li class="nav-item">
                <a  href="{{route('resoluciones.index')}}"  class="nav-link">
                  <i class="fas fa-file-pdf"></i>
                  <p>Resoluciones</p>
                </a>         
              </li>
              <li class="nav-item">
                <a  href="{{route('acuerdos.index')}}"  class="nav-link">
                  <i class="fas fa-file-pdf"></i>
                  <p>Acuerdos</p>
                </a>         
              </li>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-book-open-reader"></i>
              <p>
                         Actas de sesión
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>  
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a  href="{{route('ordinarias.index')}}"  class="nav-link">
                  <i class="fa-brands fa-readme"></i>
                  <p> Ordinaria</p>
                </a>         
              </li> 
              <li class="nav-item">
                <a  href="{{route('extraordinarias.index')}}"   class="nav-link">
                  <i class="fa-brands fa-readme"></i>
                  <p> Extraordinarias</p>
                </a> 
                <li class="nav-item">
                  <a  href="{{route('solemnes.index')}}"   class="nav-link">
                    <i class="fa-brands fa-readme"></i>
                    <p>Solecmne</p>
                  </a>
                  <li class="nav-item">
                    <a  href="{{route('especiales.index')}}"   class="nav-link">
                     <i class="fa-brands fa-readme"></i>
                      <p>Especiales</p>
                    </a>                      
              </li>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-book-open-reader"></i>
              <p>
                         Expedientes 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>  
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a  href="{{route('expedientes.index')}}"  class="nav-link">
                  <i class="fa-brands fa-readme"></i>
                  <p>Expedientes de Usuario</p>
                </a>         
              </li> 
              <li class="nav-item">
                
                <li class="nav-item">
                  <a  href="{{route('users.index')}}"   class="nav-link">
                    <i class="fa-brands fa-readme"></i>
                    <p>Ceses</p>
                  </a>
                                      
              </li>
                </li>
            </ul>
          </li>         
                              
      </li>

          <li class="nav-item">
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
            <a href="#" class="nav-link" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				
				<i class='bx bxs-log-out-circle'></i>

              <p>
           	Cerrar Sessión
           
              </p>
            </a>
          </li>
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


