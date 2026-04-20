<aside class="app-sidebar shadow" style="background-color: #ECEFF1;"><!--begin::Sidebar-->
    
    <!-- Icono y Empresa -->
    <div class="sidebar-brand"><!--begin::Sidebar Brand-->
        <a href="./index.html" class="brand-link"><!--begin::Brand Link-->
        
            <!--begin::Brand Image-->
            <img src="{{asset('favicon.png')}}" alt="Tlamati Acccess" class="brand-image opacity-75 shadow"/>
            <!--end::Brand Image-->
            <span class="brand-text fw-light">Tlamati Acccess</span><!--begin::Brand Text-->
        
        </a><!--end::Brand Text-->
    </div><!--end::Sidebar Brand-->
    
        
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >
            
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="{{url('/')}}" class="nav-link">
                    <i class="nav-icon bi bi-palette"></i>
                    <p>Principal</p>
                </a>
            </li><!-- end::Options Menu -->
            
            <!-- ---------- SCHOOL ---------- -->
            <li class="nav-header">Sedes</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-school-circle-exclamation"></i>
                    <p>Planteles <i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('school')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Planteles</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('school/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo plantel</p>
                        </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- DEPARTAMENT ---------- -->
            <li class="nav-header">Áreas</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-school"></i>
                    <p>Departamentos<i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('department')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Departamentos</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('department/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo Departamento</p>
                        </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- ROLES ---------- -->
            <li class="nav-header">Puestos</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-address-card"></i>
                    <p>Puesto<i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('rol')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Rol</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('rol/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo rol</p>
                        </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- OFFERS ---------- -->
            <li class="nav-header">Licenciatura</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-building-columns"></i>
                    <p>Licenciaturas <i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('offer')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Licenciatura</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('offer/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nueva Licenciatura</p>
                        </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- WORKERS ---------- -->
            <li class="nav-header">Trabajadores</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <p>Trabajador <i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('worker')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Trabajadores</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('worker/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo trabajador</p>
                        </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- STUDENTS ---------- -->
            <li class="nav-header">Estudiantes</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-user-graduate"></i>
                    <p>Estudiante <i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('student')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Estudiantes</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('student/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo Estudiante</p>
                        </a>
                    </li>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- VISITORS ---------- -->
            <li class="nav-header">Visitantes</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-person-military-to-person"></i>
                    <p>Visitante <i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('visitor')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Visitantes</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('visitor/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo visitante</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                    <a href="./widgets/cards.html" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Cards</p>
                    </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- INCOME ---------- -->
            <li class="nav-header">Ingresos</li>
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-person-arrow-down-to-line"></i>
                    <p>Ingreso <i class="nav-arrow bi bi-chevron-right"></i> </p>
                </a>
                
                <ul class="nav nav-treeview"><!-- begin::Opciones para el sub-menu -->
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('income')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Ingresos</p>
                        </a>
                    </li>
                    <!-- Opcion de sub-menu -->
                    <li class="nav-item">
                        <a href="{{url('income/create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Nuevo ingreso</p>
                        </a>
                    </li>
                </ul><!-- end::Opciones para el sub-menu -->
            </li><!-- end::Options Menu -->
            
            <!-- ---------- EXIT ---------- -->
            <li class="nav-item"><!-- begin::Options Menu -->
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color: #FF6B6B">
                    <i class="fa-solid fa-door-closed"></i>
                    <p>Cerrar Sesión</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>   
            </li><!-- end::Options Menu -->
                        
        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside><!--end::Sidebar-->