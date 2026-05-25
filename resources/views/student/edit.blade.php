@extends('layouts.admin')

@section('template_title')
    Editar estudiante
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Estudiante: {{ $student->nombre }}</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">Actualizar información del estudiante</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('student.update', $student->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row padding-1 p-1">
                                <div class="col-md-12">
                                    <!-- Sección de Imagen -->
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="fotografia_path" class="form-label">{{ __('Fotografía') }}</label>

                                            <!-- Preview única -->
                                            <div class="mt-2">
                                                <img
                                                    id="preview_image"
                                                    src="{{ $student->fotografia_path 
                                                            ? asset('storage/' . $student->fotografia_path) 
                                                            : 'https://via.placeholder.com/300x300?text=Sin+Imagen' }}"
                                                    alt="Vista previa"
                                                    class="img-fluid rounded shadow-sm border mb-2"
                                                    style="max-height: 300px;"
                                                >
                                            </div>

                                            <!-- Input -->
                                            <input type="file" name="fotografia_path" id="fotografia_input" accept="image/*" class="form-control @error('fotografia_path') is-invalid @enderror" >
                                        </div>

                                        <!-- Sección del Formulario -->
                                        <div class="col-md-8">
                                            
                                            <!-- Información general -->
                                            <h6 class=" mb-3 data-campo"><i class="fas fa-info-circle" style="color: rgb(38, 166, 154);"></i> {{ __('Información general') }}</h6>
                                            
                                            <div class="form-group mb-2 mb20">
                                                <label for="id_institucional" class="form-label">{{ __('Matrícula') }} <span style="color: #FF6B6B;">*</span></label>
                                                <input type="text" name="id_institucional" 
                                                    class="form-control @error('id_institucional') is-invalid @enderror" 
                                                    value="{{ old('id_institucional', $student->id_institucional) }}" id="id_institucional" placeholder="Matrícula">
                                                {!! $errors->first('id_institucional', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                            </div>

                                            <div class="form-group mb-2 mb20">
                                                <label for="nombre" class="form-label">{{ __('Nombre') }} <span style="color: #FF6B6B;">*</span></label>
                                                <input type="text" name="nombre" 
                                                    class="form-control @error('nombre') is-invalid @enderror" 
                                                    value="{{ old('nombre', $student->nombre) }}" id="nombre" placeholder="Nombre">
                                                {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2 mb20">
                                                    <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }} <span style="color: #FF6B6B;">*</span></label>
                                                    <input type="text" name="apellido_paterno" 
                                                        class="form-control @error('apellido_paterno') is-invalid @enderror" 
                                                        value="{{ old('apellido_paterno', $student->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno">
                                                    {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                                </div>

                                                <div class="col-md-6 mb-2 mb20">
                                                    <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }} <span style="color: #FF6B6B;">*</span></label>
                                                    <input type="text" name="apellido_materno" 
                                                        class="form-control @error('apellido_materno') is-invalid @enderror" 
                                                        value="{{ old('apellido_materno', $student->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno">
                                                    {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                                </div>
                                            </div>

                                            <div class="form-group mb-2 mb20">
                                                <label for="email_institucional" class="form-label">{{ __('Correo institucional') }} <span style="color: #FF6B6B;">*</span></label>
                                                <input type="email" name="email_institucional" 
                                                    class="form-control @error('email_institucional') is-invalid @enderror" 
                                                    value="{{ old('email_institucional', $student->email_institucional) }}" id="email_institucional" placeholder="Correo institucional">
                                                {!! $errors->first('email_institucional', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                            </div>

                                            <hr class="my-4">

                                            <!-- Campos Médicos -->
                                            <h6 class="mb-3 data-campo"><i class="fas fa-hospital-user" style="color: rgb(38, 166, 154);"></i> {{ __('Datos de Salud y Emergencia') }}</h6>

                                            <div class="row">
                                                <div class="col-md-6 mb-2 mb20">
                                                    <label for="tipo_sangre" class="form-label">{{ __('Tipo de Sangre') }}</label>
                                                    <select name="tipo_sangre" id="tipo_sangre" 
                                                            class="form-select form-control @error('tipo_sangre') is-invalid @enderror">
                                                        <option value="">Seleccione...</option>
                                                        <option value="A+" {{ old('tipo_sangre', $student->tipo_sangre) == 'A+' ? 'selected' : '' }}>A+</option>
                                                        <option value="A-" {{ old('tipo_sangre', $student->tipo_sangre) == 'A-' ? 'selected' : '' }}>A-</option>
                                                        <option value="B+" {{ old('tipo_sangre', $student->tipo_sangre) == 'B+' ? 'selected' : '' }}>B+</option>
                                                        <option value="B-" {{ old('tipo_sangre', $student->tipo_sangre) == 'B-' ? 'selected' : '' }}>B-</option>
                                                        <option value="O+" {{ old('tipo_sangre', $student->tipo_sangre) == 'O+' ? 'selected' : '' }}>O+</option>
                                                        <option value="O-" {{ old('tipo_sangre', $student->tipo_sangre) == 'O-' ? 'selected' : '' }}>O-</option>
                                                        <option value="AB+" {{ old('tipo_sangre', $student->tipo_sangre) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                        <option value="AB-" {{ old('tipo_sangre', $student->tipo_sangre) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                    </select>
                                                    {!! $errors->first('tipo_sangre', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                                </div>

                                                <div class="col-md-6 mb-2 mb20">
                                                    <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }} <span style="color: #FF6B6B;">*</span></label>
                                                    <input type="date" name="fecha_nacimiento" 
                                                        class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                                        value="{{ old('fecha_nacimiento', $student->fecha_nacimiento) }}" id="fecha_nacimiento">
                                                    {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2 mb20">
                                                    <label for="telefono_emergencia" class="form-label">{{ __('Teléfono de Emergencia') }}</label>
                                                    <input type="text" name="telefono_emergencia" 
                                                        class="form-control @error('telefono_emergencia') is-invalid @enderror" 
                                                        value="{{ old('telefono_emergencia', $student->telefono_emergencia) }}" id="telefono_emergencia" placeholder="Ej: 55-1234-5678">
                                                    {!! $errors->first('telefono_emergencia', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                                </div>

                                                <div class="col-md-6 mb-2 mb20">
                                                    <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
                                                    <textarea name="alergias" id="alergias" 
                                                            class="form-control @error('alergias') is-invalid @enderror" rows="3" placeholder="Ej: Penicilina, Látex...">{{ old('alergias', $student->alergias) }}</textarea>
                                                    {!! $errors->first('alergias', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <!-- Campos de Selección -->
                                            <h6 class="mb-3 data-campo"><i class="fas fa-school" style="color: rgb(38, 166, 154);"></i> {{ __('Información Institucional') }}</h6>

                                            <div class="form-group mb-2 mb20">
                                                <label for="id_school" class="form-label">{{ __('Sede') }} <span style="color: #FF6B6B;">*</span></label>
                                                <select name="id_school" id="id_school" 
                                                        class="form-select form-control @error('id_school') is-invalid @enderror">
                                                    <option value="">Seleccione una sede</option>

                                                    @foreach ($schools as $id => $plantel)
                                                        <option value="{{ $id }}"
                                                            {{ old('id_school', $student->id_school) == $id ? 'selected' : '' }}>
                                                            {{ $plantel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->first('id_school', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                            </div>

                                            <div class="form-group mb-2 mb20">
                                                <label for="id_rol" class="form-label">{{ __('Puesto') }} <span style="color: #FF6B6B;">*</span></label>
                                                <select name="id_rol" id="id_rol" 
                                                        class="form-select form-control @error('id_rol') is-invalid @enderror">
                                                    <option value="">Seleccione un rol</option>

                                                    @foreach ($rols as $id => $rol)
                                                        <option value="{{ $id }}"
                                                            {{ old('id_rol', $student->id_rol) == $id ? 'selected' : '' }}>
                                                            {{ $rol }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->first('id_rol', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                            </div>

                                            <div class="form-group mb-2 mb20">
                                                <label for="id_offer" class="form-label">{{ __('Grado de estudio') }} <span style="color: #FF6B6B;">*</span></label>
                                                <select name="id_offer" id="id_offer" 
                                                        class="form-select form-control @error('id_offer') is-invalid @enderror">
                                                    <option value="">Seleccione una oferta</option>

                                                    @foreach ($offers as $id => $nombre)
                                                        <option value="{{ $id }}"
                                                            {{ old('id_offer', $student->id_offer) == $id ? 'selected' : '' }}>
                                                            {{ $nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->first('id_offer', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                            </div>

                                            <div class="form-group mb-2 mb20">
                                                <label for="estado" class="form-label">{{ __('Estado') }} <span style="color: #FF6B6B;">*</span></label>
                                                <select name="estado" id="estado" 
                                                        class="form-select form-control @error('estado') is-invalid @enderror">
                                                    <option value="activo" {{ old('estado', $student->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                                    <option value="inactivo" {{ old('estado', $student->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                    <option value="suspendido" {{ old('estado', $student->estado) == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                                                </select>
                                                {!! $errors->first('estado', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-md-12 mt20 mt-2">
                                    <div class="row"><!-- row -->
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <a href="{{ route('student.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-save"  style="color: #E0E0E0;"></i> {{ __('Guardar Cambios') }}</button>
                                            </div>
                                        </div>
                                    </div><!-- /.row --> 
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
                            </script>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
