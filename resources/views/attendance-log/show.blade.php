@extends('layouts.admin')

@section('template_title')
    {{ $attendanceLog->name ?? __('Show') . " " . __('Attendance Log') }}
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
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Historial de acceso del usuario') }}</span>
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
                                            <p class="fs-5">{{ $attendanceLog->created_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</p>
                                        </div> 
            
                                        <!-- Fila II -->
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="form-label">Última actualización</p>
                                        </div> 
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="fs-5">{{ $attendanceLog->updated_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</p>
                                        </div> 
            
                                        <!-- Fila III -->
                                        <div class="col-md-6 themed-grid-col">
                                            <p class="form-label">Tipo de Ingreso</p>
                                        </div> 
                                        <div class="col-md-6 themed-grid-col">
                                            @if($attendanceLog->id_student)
                                                <p class="badge bg-success fs-5" style="font-size: 12px; padding: 5px; font-weight: normal;"> Estudiante</p>
                                                @elseif($attendanceLog->id_worker)
                                                <p class="badge bg-primary fs-5" style="font-size: 12px; padding: 5px; font-weight: normal;"> Trabajador</p>
                                                @elseif($attendanceLog->id_visitor)
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
                        @if($attendanceLog->id_worker && $attendanceLog->worker)
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
                                                @if($attendanceLog->worker->fotografia_path)
                                                <div class="mt-2 form-group mb-2 mb20" style="text-align: center; align-items: center;">
                                                    <img
                                                        id="preview_image"
                                                        src="{{ $attendanceLog->worker->fotografia_path
                                                                ? asset('storage/' . $attendanceLog->worker->fotografia_path) 
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
                                                        {{ substr($attendanceLog->worker->id_institucional, 0, 2) . '-' .
                                                        substr($attendanceLog->worker->id_institucional, 2, 3) . '-' .
                                                        substr($attendanceLog->worker->id_institucional, 5, 4) }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->nombre }} {{ $attendanceLog->worker->apellido_paterno }} {{ $attendanceLog->worker->apellido_materno }}
                                                    </div>
                                                </div>
        
                                                <!-- <div class="form-group mb-2 mb20">
                                                    <label for="email_institucional" class="form-label">{{ __('Correo institucional') }}</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->email_institucional ?? 'No registrado' }}
                                                    </div>
                                                </div> -->
        
                                                <hr class="my-4">
        
                                                <!-- Campos Médicos -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-hospital-user" style="color: rgb(38, 166, 154);"></i> {{ __('Datos de Salud y Emergencia') }}</h6>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="tipo_sangre" class="form-label">{{ __('Tipo de Sangre') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->worker->tipo_sangre ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <!-- <div class="col-md-6 mb-2 mb20">
                                                        <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->worker->fecha_nacimiento ?? 'No declarado' }}
                                                        </div>
                                                    </div> -->
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="telefono_emergencia" class="form-label">{{ __('Teléfono de Emergencia') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->worker->telefono_emergencia ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->worker->alergias ?? 'No declarado' }}
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-school" style="color: rgb(38, 166, 154);"></i> {{ __('Información Institucional') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Sede</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->school->plantel ?? 'No asignado' }}
                                                    </div>
                                                </div>
<!--         
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Dirección del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->school->direccion ?? 'No disponible' }}
                                                    </div>
                                                </div> -->
        
                                                <!-- <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Correo del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->school->correo ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Teléfono del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->school->telefono ?? 'No disponible' }}
                                                    </div>
                                                </div> -->
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-briefcase" style="color: rgb(38, 166, 154);"></i> {{ __('Información de cargo') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Puesto</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->rol->rol ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Descripción del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->rol->descripcion ?? 'Sin descripción' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Departamento del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->rol->department->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_offer" class="input-group mb-3 form-label">Oferta Académica</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->worker->offer->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                                                    <div class="fs-5"  style="text-transform: capitalize;">
                                                        {{ $attendanceLog->worker->estado ?? 'Sin estado' }}
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
                        @if($attendanceLog->id_student && $attendanceLog->student)
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
                                                @if($attendanceLog->student->fotografia_path)
                                                <div class="mt-2 form-group mb-2 mb20" style="text-align: center; align-items: center;">
                                                    <img
                                                        id="preview_image"
                                                        src="{{ $attendanceLog->student->fotografia_path
                                                                ? asset('storage/' . $attendanceLog->student->fotografia_path) 
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
                                                        {{ substr($attendanceLog->student->id_institucional, 0, 2) . '-' .
                                                        substr($attendanceLog->student->id_institucional, 2, 3) . '-' .
                                                        substr($attendanceLog->student->id_institucional, 5, 4) }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->nombre }} {{ $attendanceLog->student->apellido_paterno }} {{ $attendanceLog->student->apellido_materno }}
                                                    </div>
                                                </div>
        
                                                <!-- <div class="form-group mb-2 mb20">
                                                    <label for="email_institucional" class="form-label">{{ __('Correo institucional') }}</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->email_institucional ?? 'No registrado' }}
                                                    </div>
                                                </div> -->
        
                                                <hr class="my-4">
        
                                                <!-- Campos Médicos -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-hospital-user" style="color: rgb(38, 166, 154);"></i> {{ __('Datos de Salud y Emergencia') }}</h6>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="tipo_sangre" class="form-label">{{ __('Tipo de Sangre') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->student->tipo_sangre ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <!-- <div class="col-md-6 mb-2 mb20">
                                                        <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->student->fecha_nacimiento ?? 'No declarado' }}
                                                        </div>
                                                    </div> -->
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="telefono_emergencia" class="form-label">{{ __('Teléfono de Emergencia') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->student->telefono_emergencia ?? 'No declarado' }}
                                                        </div>
                                                    </div>
        
                                                    <div class="col-md-6 mb-2 mb20">
                                                        <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
                                                        <div class="fs-5">
                                                            {{ $attendanceLog->student->alergias ?? 'No declarado' }}
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-school" style="color: rgb(38, 166, 154);"></i> {{ __('Información Institucional') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Sede</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->school->plantel ?? 'No asignado' }}
                                                    </div>
                                                </div>
<!--         
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_school" class="input-group mb-3 form-label">Dirección del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->school->direccion ?? 'No disponible' }}
                                                    </div>
                                                </div> -->
<!--         
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Correo del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->school->correo ?? 'No disponible' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Teléfono del plantel</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->school->telefono ?? 'No disponible' }}
                                                    </div>
                                                </div> -->
        
                                                <hr class="my-4">
        
                                                <!-- Campos de Selección -->
                                                <h6 class="mb-3 data-campo"><i class="fas fa-briefcase" style="color: rgb(38, 166, 154);"></i> {{ __('Información de cargo') }}</h6>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Puesto</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->rol->rol ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Descripción del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->rol->descripcion ?? 'Sin descripción' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_rol" class="input-group mb-3 form-label">Departamento del puesto</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->rol->department->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="id_offer" class="input-group mb-3 form-label">Oferta Académica</label>
                                                    <div class="fs-5">
                                                        {{ $attendanceLog->student->offer->nombre ?? 'No asignado' }}
                                                    </div>
                                                </div>
        
                                                <div class="form-group mb-2 mb20">
                                                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                                                    <div class="fs-5"  style="text-transform: capitalize;">
                                                        {{ $attendanceLog->student->estado ?? 'Sin estado' }}
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
                        @if($attendanceLog->id_visitor && $attendanceLog->visitor)
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Información del visitante</h5>
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
                                                    <p class="fs-5">{{ $attendanceLog->visitor->nombre }} {{ $attendanceLog->visitor->apellido_paterno }} {{ $attendanceLog->visitor->apellido_materno ?? '' }}</p>
                                                </div> 
                    
                                                <!-- Fila II -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Motivo de visita') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="fs-5">{{ $attendanceLog->visitor->motivo }}</p>
                                                </div> 
                    
                                                <!-- Fila III -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('¿Es menor de edad?') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    @if($attendanceLog->visitor->es_menor)
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
                                                    {{ $attendanceLog->visitor->identificacion ?? 'No registrada' }}
                                                </div>
                    
                                                <!-- Fila V -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Reactivación') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    @if($attendanceLog->visitor->reactivacion)
                                                        <span class="badge bg-warning">Sí</span>
                                                    @else
                                                        <span class="badge bg-secondary">No</span>
                                                    @endif
                                                </div>

                                                <!-- Fila VI -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Código QR') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    {{ $attendanceLog->visitor->code_qr }}
                                                </div>

                                                <!-- Fila VII -->
                                                <div class="col-md-6 themed-grid-col">
                                                    <p class="form-label">{{ __('Fechas de impresión') }}</p>
                                                </div> 
                                                <div class="col-md-6 themed-grid-col">
                                                    @php
                                                        $fechas = $attendanceLog->visitor->fechas_impresion;
                                                    @endphp

                                                    @if($fechas)
                                                        <ul class="mb-0">
                                                            @foreach($fechas as $fecha)
                                                                <li>{{ date('d/m/Y H:i:s', strtotime($fecha)) }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        Sin registros
                                                    @endif
                                                </div>

                                            </div><!-- /row -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif                                
                        

                        <!-- --------------------------- -->
                        <!-- ----- SIN INFORMACION ----- -->
                        <!-- --------------------------- -->
                        @if(!$attendanceLog->id_student && !$attendanceLog->id_worker && !$attendanceLog->id_visitor)
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
                                        <p class="text-success"><i class="fas fa-check-circle" style="color: rgb(38, 166, 154);"></i> El usuario está actualmente <strong>DENTRO del plantel</strong></p>
                                    @else
                                        <p class="text-danger"><i class="fas fa-times-circle" style="color: rgb(38, 166, 154);"></i> El usuario está actualmente <strong>AFUERA del plantel</strong></p>
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
                            @if(!$income->id_student && !$income->id_worker && !$income->id_visitor)
                                <div class="alert alert-warning text-center">
                                    <i class="fa fa-exclamation-triangle"></i> No hay información asociada a este ingreso.
                                </div>
                            @endif
                        @endif
                        <hr>
                        <div class="row"><!-- row -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{route('attendance-log.index')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div><!-- /.row -->  
                    </div>  
                </div>

            </div>
        </div>
    </div>
</div>
</section>
                
@endsection
