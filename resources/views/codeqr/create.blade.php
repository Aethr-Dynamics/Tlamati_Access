@extends('layouts.admin')

@section('template_title')
    Codigo QR
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Generar nuevo código QR</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->
    
    @if (Session::has('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Éxito",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            // text: '{{ Session::get('error') }}',
            text: 'A ocurrido un error.',
            confirmButtonColor: '#d33'
        });
    </script>
    @endif 

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default card-outline card-secondary">
                    <div class="card-header">
                        <span class="card-title">Nuevo código QR</span>
                    </div>
                    <div class="card-body bg-white">

                        <!-- Formulario de búsqueda -->
                        <form action="{{ route('codeqr.store') }}" method="POST" id="searchForm">
                            @csrf
                            <div class="mb-3">
                                <label for="id_institucional" class="form-label">ID Institucional</label>
                                <input type="text" name="id_institucional" id="id_institucional" 
                                    class="form-control" placeholder="Ej: 20240001" required autofocus>
                            </div>

                            @if($errors->has('id_institucional'))
                                <div class="alert alert-danger">{{ $errors->first('id_institucional') }}</div>
                            @endif

                            <!-- Botón de búsqueda -->
                            <button type="submit" class="btn btn-primary">Buscar Usuario</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Sección de Información del Usuario (oculta inicialmente) -->
        @if(session('user'))
        
        <hr>
        <div class="card card-default card-outline card-success shadow">
            <div class="card-body">
        
                <h4 class="mb-4">
                    <i class="fa-solid fa-user " style="color: rgb(38, 166, 154);"></i> Información del Usuario
                </h4>
        
                <div class="row">
        
                    <div class="col-md-3 text-center">
        
                        @if(session('user')['fotografia_path'])
        
                            <img src="{{ asset(session('user')['fotografia_path']) }}"
                                class="img-fluid shadow"
                                style="height:180px; object-fit:cover;">
        
                        @endif
        
                    </div>
        
                    <div class="col-md-9">

                        <div class="row"> 
                            
                            <!-- Fila I -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Matricula</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">{{ session('user')['id_institucional'] }}</p>
                            </div> 
                            
                            <!-- Fila II -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Nombre</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">
                                    {{ session('user')['nombre'] }}
                                    {{ session('user')['apellido_paterno'] }}
                                    {{ session('user')['apellido_materno'] }}
                                </p>
                            </div> 
                            
                            <!-- Fila III -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Correo Institucional</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">{{ session('user')['email_institucional'] }}</p>
                            </div> 
                            
                            <!-- Fila IV -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Plantel</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">{{ session('user')['school_name'] }}</p>
                            </div> 
                            
                            <!-- Fila V -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Puesto</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">{{ session('user')['rol_name'] }}</p>
                            </div> 
                            
                            <!-- Fila VI -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Oferta Educativa</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">{{ session('user')['offer_name'] }}</p>
                            </div> 
                            
                            <!-- Fila VII -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Estado</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">
                                    @if(session('user')['estado'] == 1)

                                        <span class="badge bg-success">
                                            Activo
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactivo
                                        </span>

                                    @endif
                                </p>
                            </div> 

                            <!-- Fila VIII -->
                            <div class="col-md-6 themed-grid-col">
                                <p class="form-label">Tipo</p>
                            </div> 
                            <div class="col-md-6 themed-grid-col">
                                <p class="fs-5">
                                    @if(session('type') === 'students')
                                        Estudiante
                                    @else
                                        Trabajador
                                    @endif
                                </p>
                            </div>                             
                            
                        </div>
        
                        <form action="{{ route('codeqr.generate') }}"
                            method="POST">
        
                            @csrf
        
                            <input type="hidden"
                                name="id"
                                value="{{ session('user')['id'] }}">
        
                            <input type="hidden"
                                name="type"
                                value="{{ session('type') }}">
        
                            <button type="submit"
                                class="btn btn-success">
        
                                <i class="fa-solid fa-qrcode" style="color: white;"></i>
                                Generar Código QR
        
                            </button>
        
                        </form>
        
                    </div>
        
                </div>
        
            </div>
        </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {

                button.addEventListener('click', function () {

                    let form = this.closest('form');

                    Swal.fire({
                        title: '¿Eliminar registro?',
                        text: "Esta acción no se puede deshacer",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {

                        if (result.isConfirmed) {

                            form.submit();

                        }

                    });

                });

            });

        });
    </script>          
@endsection
