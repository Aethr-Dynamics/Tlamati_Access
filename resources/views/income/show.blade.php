@extends('layouts.admin')

@section('template_title')
    Detalle de Ingreso
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Detalle de Ingreso</h3>
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
                            <span class="card-title">Información de entrada</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0">Información del Ingreso</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row"><!-- row -->
                                        <!-- Fila I -->
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="form-label">Fecha/Hora</p>
                                        </div> 
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="fs-5">{{ $income->created_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</p>
                                        </div> 
            
                                        <!-- Fila II -->
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="form-label">Última actualización</p>
                                        </div> 
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="fs-5">{{ $income->updated_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</p>
                                        </div> 
            
                                        <!-- Fila III -->
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="form-label">Tipo de Ingreso</p>
                                        </div> 
                                        <div class="col-md-6 themed-grid-col">
                                            @if($income->con_student)
                                                <p class="badge bg-success fs-5" style="font-size: 12px; padding: 5px; font-weight: normal;"> Estudiante</p>
                                                @elseif($income->con_worker)
                                                <p class="badge bg-primary fs-5" style="font-size: 12px; padding: 5px; font-weight: normal;"> Trabajador</p>
                                                @elseif($income->con_visitor)
                                                <p class="badge bg-info fs-5" style="font-size: 12px; padding: 5px; font-weight: normal;"> Visitante</p>
                                                @else
                                                <p class="badge bg-info fs-5" style="font-size: 12px; padding: 5px; font-weight: normal;"> Desconocido</p>
                                            @endif
                                        </div> 
                                    </div><!-- /row -->
                                </div>
                            </div>
                        </div>

                        <!-- ---------------------- -->
                        <!-- ----- TRABAJADOR ----- -->
                        <!-- ---------------------- -->                                               
                        @if($income->con_worker && $income->worker)
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Información del Trabajador</h5>
                            </div>
                            <div class="card-body">

                                <div class="row padding-1 p-1">
                                    <div class="col-md-12">
                                        <div class="row mb-4"> 

                                            <!-- ----------------------------- -->
                                            <!-- ----- Sección de Imagen ----- -->
                                            <!-- ----------------------------- -->
                                            <div class="col-md-4">
                                                <label for="fotografia_path" class="form-label">{{ __('Fotografía') }}</label>  
    
                                                <!-- Fotografia de trabajador -->
                                                @if($income->worker->fotografia_path)
                                                <div class="mt-2 form-group mb-2 mb20" style="text-align: center; align-items: center;">
                                                    <img
                                                        id="preview_image"
                                                        src="{{ $income->worker->fotografia_path
                                                                ? asset('storage/' . $income->worker->fotografia_path) 
                                                                : 'https://via.placeholder.com/300x300?text=Sin+Imagen' }}"
                                                        alt="Vista previa"
                                                        class="img-fluid rounded shadow-sm border mb-2"
                                                        style="max-height: 300px;"
                                                    >
                                                </div>
                                                @endif                                  
                                            </div>

                                            <!-- -------------------------------------- -->
                                            <!-- ----- Información del trabajador ----- -->
                                            <!-- -------------------------------------- -->
                                            <!-- Sección del Formulario -->
                                            <div class="col-md-8">
                                                
                                                <!-- Información general -->
                                                <h6 class=" mb-3 data-campo"><i class="fas fa-info-circle" style="color: rgb(38, 166, 154);"></i> {{ __('Información general') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_institucional" class="form-label">{{ __('Matrícula') }}</label>
                                                    <div class="fs-5">
                                                        {{ substr($income->worker->id_institucional, 0, 2) . '-' .
                                                        substr($income->worker->id_institucional, 2, 3) . '-' .
                                                        substr($income->worker->id_institucional, 5, 4) }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->nombre }} {{ $income->worker->apellido_paterno }} {{ $income->worker->apellido_materno }}
                                                    </div>
                                                </div>
        
                                                <!-- <div class="form-group mb-2 mb20">
                                                    <label for="email_institucional" class="form-label">{{ __('Correo institucional') }}</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->email_institucional ?? 'No registrado' }}
                                                    </div>
                                                </div> -->
        
                                                <hr class="my-4">
        
                                                <!-- Campos Médicos -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-hospital-user" style="color: rgb(38, 166, 154);"></i> {{ __('Datos de Salud y Emergencia') }}</h6>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="tipo_sangre" class="form-label">{{ __('Tipo de Sangre') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->worker->tipo_sangre ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <!-- <div class="col-md-6 mb-2 mb20">
                                                        <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->worker->fecha_nacimiento ?? 'No declarado' }}
                                                        </div>
                                                    </div> -->
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="telefono_emergencia" class="form-label">{{ __('Teléfono de Emergencia') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->worker->telefono_emergencia ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->worker->alergias ?? 'No declarado' }}
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-school" style="color: rgb(38, 166, 154);"></i> {{ __('Información Institucional') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Sede</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->school->plantel ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Dirección del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->school->direccion ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Correo del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->school->correo ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Teléfono del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->school->telefono ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-briefcase" style="color: rgb(38, 166, 154);"></i> {{ __('Información de cargo') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Puesto</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->rol->rol ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Descripción del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->rol->descripcion ?? 'Sin descripción' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Departamento del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->rol->department->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_offer" class="input-group mb-3 form-label">Oferta Académica</label>
                                                    <div class="fs-5">
                                                        {{ $income->worker->offer->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                                                    <div class="fs-5"  style="text-transform: capitalize;">
                                                        {{ $income->worker->estado ?? 'Sin estado' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif                                
                        
                        <hr class="my-4">

                        <!-- ---------------------- -->
                        <!-- ----- ESTUDIANTE ----- -->
                        <!-- ---------------------- -->                                               
                        @if($income->con_student && $income->student)
                        <div class="card mb-3">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Información del estudiante</h5>
                            </div>
                            <div class="card-body">

                                <div class="row padding-1 p-1">
                                    <div class="col-md-12">
                                        <div class="row mb-4"> 

                                            <!-- ----------------------------- -->
                                            <!-- ----- Sección de Imagen ----- -->
                                            <!-- ----------------------------- -->
                                            <div class="col-md-4">
                                                <label for="fotografia_path" class="form-label">{{ __('Fotografía') }}</label>  
    
                                                <!-- Fotografia de estudiante -->
                                                @if($income->student->fotografia_path)
                                                <div class="mt-2 form-group mb-2 mb20" style="text-align: center; align-items: center;">
                                                    <img
                                                        id="preview_image"
                                                        src="{{ $income->student->fotografia_path
                                                                ? asset('storage/' . $income->student->fotografia_path) 
                                                                : 'https://via.placeholder.com/300x300?text=Sin+Imagen' }}"
                                                        alt="Vista previa"
                                                        class="img-fluid rounded shadow-sm border mb-2"
                                                        style="max-height: 300px;"
                                                    >
                                                </div>
                                                @endif                                  
                                            </div>

                                            <!-- -------------------------------------- -->
                                            <!-- ----- Información del estudiante ----- -->
                                            <!-- -------------------------------------- -->
                                            <!-- Sección del Formulario -->
                                            <div class="col-md-8">
                                                
                                                <!-- Información general -->
                                                <h6 class=" mb-3 data-campo"><i class="fas fa-info-circle" style="color: rgb(38, 166, 154);"></i> {{ __('Información general') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_institucional" class="form-label">{{ __('Matrícula') }}</label>
                                                    <div class="fs-5">
                                                        {{ substr($income->student->id_institucional, 0, 2) . '-' .
                                                        substr($income->student->id_institucional, 2, 3) . '-' .
                                                        substr($income->student->id_institucional, 5, 4) }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->nombre }} {{ $income->student->apellido_paterno }} {{ $income->student->apellido_materno }}
                                                    </div>
                                                </div>
        
                                                <!-- <div class="form-group mb-2 mb20">
                                                    <label for="email_institucional" class="form-label">{{ __('Correo institucional') }}</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->email_institucional ?? 'No registrado' }}
                                                    </div>
                                                </div> -->
        
                                                <hr class="my-4">
        
                                                <!-- Campos Médicos -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-hospital-user" style="color: rgb(38, 166, 154);"></i> {{ __('Datos de Salud y Emergencia') }}</h6>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="tipo_sangre" class="form-label">{{ __('Tipo de Sangre') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->student->tipo_sangre ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <!-- <div class="col-md-6 mb-2 mb20">
                                                        <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->student->fecha_nacimiento ?? 'No declarado' }}
                                                        </div>
                                                    </div> -->
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="telefono_emergencia" class="form-label">{{ __('Teléfono de Emergencia') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->student->telefono_emergencia ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
                                                        <div class="fs-5">
                                                            {{ $income->student->alergias ?? 'No declarado' }}
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-school" style="color: rgb(38, 166, 154);"></i> {{ __('Información Institucional') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Sede</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->school->plantel ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Dirección del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->school->direccion ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Correo del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->school->correo ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Teléfono del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->school->telefono ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-briefcase" style="color: rgb(38, 166, 154);"></i> {{ __('Información de cargo') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Puesto</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->rol->rol ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Descripción del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->rol->descripcion ?? 'Sin descripción' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Departamento del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->rol->department->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_offer" class="input-group mb-3 form-label">Oferta Académica</label>
                                                    <div class="fs-5">
                                                        {{ $income->student->offer->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                                                    <div class="fs-5"  style="text-transform: capitalize;">
                                                        {{ $income->student->estado ?? 'Sin estado' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif                                
                        
                        <!-- --------------------- -->
                        <!-- ----- VISITANTE ----- -->
                        <!-- --------------------- -->                                               
                        @if($income->con_visitor && $income->visitor)
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Información del estudiante</h5>
                            </div>
                            <div class="card-body">

                                <div class="row padding-1 p-1">
                                    <div class="col-md-12">
                                        <div class="row mb-4"> 

                                            <!-- -------------------------------------- -->
                                            <!-- ----- Información del visitante ----- -->
                                            <!-- -------------------------------------- -->
                                            <div class="row"><!-- row -->
                                                <!-- Fila I -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Nombre') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="fs-5">{{ $income->visitor->nombre }} {{ $income->visitor->apellido_paterno }} {{ $income->visitor->apellido_materno ?? '' }}</p>
                                                </div> 
                    
                                                <!-- Fila II -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Motivo de visita') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="fs-5">{{ $income->visitor->motivo }}</p>
                                                </div> 
                    
                                                <!-- Fila III -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('¿Es menor de edad?') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    @if($income->visitor->es_menor)
                                                        <span class="badge bg-warning">Sí</span>
                                                    @else
                                                        <span class="badge bg-success">No</span>
                                                    @endif
                                                </div>
                    
                                                <!-- Fila IV -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Identificación') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    {{ $income->visitor->identificacion ?? 'No registrada' }}
                                                </div>
                    
                                                <!-- Fila V -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Reactivación') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    @if($income->visitor->reactivacion)
                                                        <span class="badge bg-warning">Sí</span>
                                                    @else
                                                        <span class="badge bg-secondary">No</span>
                                                    @endif
                                                </div>

                                                <!-- Fila VI -->
                                                <!-- <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Código QR') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    {{ $income->visitor->code_qr }}
                                                </div> -->

                                                <!-- Fila VII -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Fechas de impresión') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                @forelse($income->visitor->fechas_impresion_formateadas as $fecha)
                                                    <div>{{ $fecha }}</div>
                                                @empty
                                                    <div>Sin registros</div>
                                                @endforelse
                                                </div>

                                            </div><!-- /row -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif                                
                        
                        <hr class="my-4">

                        <!-- --------------------------- -->
                        <!-- ----- SIN INFORMACION ----- -->
                        <!-- --------------------------- -->
                        @if(!$income->con_student && !$income->con_worker && !$income->con_visitor)
                            <div class="alert alert-warning text-center">
                                <i class="fa fa-exclamation-triangle"></i> No hay información asociada a este ingreso.
                            </div>
                        @endif    

                        <!-- ------------------------------------------------ -->
                        <!-- ----- SECCION DE HISTORIAL Y ESTADO ACTUAL ----- -->
                        <!-- ------------------------------------------------ -->                        
                        <!-- Sección de Historial y Estado Actual -->
                        @if($attendanceHistory && $userType)
                            <h5 class="mb-3 form-label">Historial de Accesos</h5>
                            
                            <div class="card mb-3">
                                <div class="card-header bg-secondary text-white">
                                    <h6 class="mb-0">Estado Actual</h6>
                                </div>
                                <div class="card-body">
                                    @if($isInside)
                                        <p class="text-success"><i class="fas fa-check-circle"></i> El usuario está actualmente <strong>DENTRO del plantel</strong></p>
                                    @else
                                        <p class="text-danger"><i class="fas fa-times-circle"></i> El usuario está actualmente <strong>AFUERA del plantel</strong></p>
                                    @endif

                                    <hr>
                                    <h6 class="mb-2">Historial de Accesos (Hoy)</h6>
                                    
                                    @if($attendanceHistory->count() > 0)
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach($attendanceHistory as $log)
                                                    <tr>
                                                        <td>{{ $log['time'] }}</td>
                                                        <!-- <td style="color: {{ $log['action'] === 'entry' ? 'green' : 'red' }}">
                                                            {{ ucfirst($log['action']) }}
                                                        </td> -->
                                                        <td>
                                                            @if($log['action'] === 'entry')
                
                                                                <span
                                                                    class="badge"
                                                                    style="
                                                                        background-color: #198754;
                                                                        color: white;
                                                                        font-size: 12px;
                                                                        padding: 6px 10px;
                                                                    "
                                                                >
                                                                    <i class="fas fa-arrow-right" style="color: #E0E0E0;"></i>
                                                                    Entrada
                                                                </span>
                
                                                            @elseif($log['action'] === 'exit')
                
                                                                <span
                                                                    class="badge"
                                                                    style="
                                                                        background-color: #dc3545;
                                                                        color: white;
                                                                        font-size: 12px;
                                                                        padding: 6px 10px;
                                                                    "
                                                                >
                                                                    <i class="fas fa-arrow-left" style="color: #E0E0E0;"></i>
                                                                    Salida
                                                                </span>
                
                                                            @endif
                                                        </td>                                                         
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="text-muted">No hay registros de acceso hoy.</p>
                                    @endif

                                    <!-- <div class="row"> 
                                        <div class="col-md-6 themed-grid-col">
                                            Formulario para descargar historial en JSON
                                            <form action="{{ route('attendance.export') }}" method="POST" target="_blank">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $userId }}">
                                                <input type="hidden" name="type" value="{{ $userType }}">

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="fas fa-download"></i> Descargar Historial (JSON)
                                                </button>
                                            </form> 
                                        </div> 

                                        <div class="col-md-6 themed-grid-col">
                                            Botón para consultar estado actual
                                            <a href="{{ route('attendance.status', ['id' => $userId, 'type' => $userType]) }}" 
                                                class="btn btn-outline-info" target="_blank">
                                                <i class="fas fa-clock"></i> Consultar Estado Actual (API)
                                            </a>
                                        </div> 
                                    </div>                                 -->
                                </div>
                            </div>

                        @else
                            @if(!$income->con_student && !$income->con_worker && !$income->con_visitor)
                                <div class="alert alert-warning text-center">
                                    <i class="fa fa-exclamation-triangle"></i> No hay información asociada a este ingreso.
                                </div>
                            @endif
                        @endif
                    </div>
                </div>                        
                <hr>
                <div class="row"><!-- row -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="{{route('income.index')}}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div><!-- /.row -->  
            </div>
        </div>
    </div>
</div>
</section>
@endsection


