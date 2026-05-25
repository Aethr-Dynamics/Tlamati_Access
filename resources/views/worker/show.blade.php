@extends('layouts.admin')

@section('template_title')
    Información del trabajador
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Trabajador: {{ $worker->nombre }}</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Datos del trabjador</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        

                        <div class="row padding-1 p-1">
                            <div class="col-md-12">
                                <!-- Sección de Imagen -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="fotografia_path" class="form-label">
                                            {{ __('Fotografía') }}
                                        </label>

                                        <!-- Preview única -->
                                        <div class="mt-2 form-group mb-2 mb20" style="text-align: center; align-items: center;">
                                            <img
                                                id="preview_image"
                                                src="{{ $worker->fotografia_path 
                                                        ? asset('storage/' . $worker->fotografia_path) 
                                                        : 'https://via.placeholder.com/300x300?text=Sin+Imagen' }}"
                                                alt="Vista previa"
                                                class="img-fluid rounded shadow-sm border mb-2"
                                                style="max-height: 300px;"
                                            >
                                        </div>
                                    </div>

                                    <!-- Sección del Formulario -->
                                    <div class="col-md-8">
                                        
                                        <!-- Información general -->
                                        <h6 class=" mb-3 data-campo"><i class="fas fa-info-circle" style="color: rgb(38, 166, 154);"></i> {{ __('Información general') }}</h6>

                                        <div class="form-group mb-2 mb20">
                                            <label for="id_institucional" class="form-label">{{ __('Matrícula') }}</label>
                                            <div class="fs-5">
                                                {{ 
                                                    substr($worker->id_institucional, 0, 2) . '-' . 
                                                    substr($worker->id_institucional, 2, 3) . '-' . 
                                                    substr($worker->id_institucional, 5, 4) 
                                                }}                                                
                                            </div>
                                        </div>

                                        <div class="form-group mb-2 mb20">
                                            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                            <div class="fs-5">
                                                {{ $worker->nombre }}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-2 mb20">
                                                <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
                                                <div class="fs-5">
                                                    {{ $worker->apellido_paterno }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-2 mb20">
                                                <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
                                                <div class="fs-5">
                                                    {{ $worker->apellido_materno }}
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group mb-2 mb20">
                                            <label for="email_institucional" class="form-label">{{ __('Correo institucional') }}</label>
                                            <div class="fs-5">
                                                {{ $worker->email_institucional }}
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <!-- Campos Médicos -->
                                        <h6 class="mb-3 data-campo"><i class="fas fa-hospital-user" style="color: rgb(38, 166, 154);"></i> {{ __('Datos de Salud y Emergencia') }}</h6>

                                        <div class="row">
                                            <div class="col-md-6 mb-2 mb20">
                                                <label for="tipo_sangre" class="form-label">{{ __('Tipo de Sangre') }}</label>
                                                <div class="fs-5">
                                                    {{ $worker->tipo_sangre ?? 'No declarado' }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-2 mb20">
                                                <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
                                                <div class="fs-5">
                                                    {{ $worker->fecha_nacimiento ?? 'No declarado' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-2 mb20">
                                                <label for="telefono_emergencia" class="form-label">{{ __('Teléfono de Emergencia') }}</label>
                                                <div class="fs-5">
                                                    {{ $worker->telefono_emergencia ?? 'No declarado' }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-2 mb20">
                                                <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
                                                <div class="fs-5">
                                                    {{ $worker->alergias ?? 'No declarado' }}
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <!-- Campos de Selección -->
                                        <h6 class="mb-3 data-campo"><i class="fas fa-school" style="color: rgb(38, 166, 154);"></i> {{ __('Información Institucional') }}</h6>

                                        <div class="form-group mb-2 mb20">
                                            <label for="id_school" class="input-group mb-3 form-label">Sede</label>
                                            <div class="fs-5">
                                                {{  $worker->school->plantel ?? 'Sin sede' }}
                                            </div>
                                        </div>

                                        <div class="form-group mb-2 mb20">
                                            <label for="id_rol" class="input-group mb-3 form-label">Rol</label>
                                            <div class="fs-5">
                                                {{ $worker->rol->rol ?? 'Sin rol' }}
                                            </div>
                                        </div>

                                        <div class="form-group mb-2 mb20">
                                            <label for="id_offer" class="input-group mb-3 form-label">Oferta Académica</label>
                                            <div class="fs-5">
                                                {{  $worker->offer->nombre ?? 'Sin licenciatura' }}
                                            </div>
                                        </div>

                                        <div class="form-group mb-2 mb20">
                                            <label for="estado" class="form-label">{{ __('Estado') }}</label>
                                            <div class="fs-5">
                                                {{ $worker->estado ?? 'Sin estado' }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Script para previsualizar imagen -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function () {

                            const fileInput = document.getElementById('fotografia_input');
                            const previewImage = document.getElementById('preview_image');

                            fileInput.addEventListener('change', function (e) {

                                const file = e.target.files[0];

                                if (!file) return;

                                if (!file.type.startsWith('image/')) {
                                    alert('Selecciona una imagen válida');
                                    return;
                                }

                                const reader = new FileReader();

                                reader.onload = function (event) {
                                    previewImage.src = event.target.result;
                                };

                                reader.readAsDataURL(file);
                            });

                        });                        
                        
                        <hr>
                        <div class="row"><!-- row -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{ route('worker.index') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div><!-- /.row -->                                 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
