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
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">Información del Ingreso</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Fecha/Hora:</th>
                                                <td>{{ $income->created_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Última actualización:</th>
                                                <td>{{ $income->updated_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tipo de Ingreso:</th>
                                                <td>
                                                    @if($income->con_student)
                                                        <p class="badge bg-success" style="font-size: 12px; padding: 5px; font-weight: normal;"> Estudiante</p>
                                                        @elseif($income->con_worker)
                                                        <p class="badge bg-primary" style="font-size: 12px; padding: 5px; font-weight: normal;"> Trabajador</p>
                                                        @elseif($income->con_visitor)
                                                        <p class="badge bg-info" style="font-size: 12px; padding: 5px; font-weight: normal;"> Visitante</p>
                                                        @else
                                                        <p class="badge bg-info" style="font-size: 12px; padding: 5px; font-weight: normal;"> Desconocido</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                @if($income->con_student && $income->student)
                                    <div class="card mb-3">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0">Información del Estudiante</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="35%">Matrícula:</th>
                                                    <td>
                                                        <strong>
                                                            {{ substr($income->student->id_institucional, 0, 2) . '-' .
                                                            substr($income->student->id_institucional, 2, 3) . '-' .
                                                            substr($income->student->id_institucional, 5, 4) }}
                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Nombre completo:</th>
                                                    <td><strong>{{ $income->student->nombre }} {{ $income->student->apellido_paterno }} {{ $income->student->apellido_materno }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <th>Email institucional:</th>
                                                    <td>{{ $income->student->email_institucional ?? 'No registrado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Plantel:</th>
                                                    <td>{{ $income->student->school->plantel ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dirección del plantel:</th>
                                                    <td>{{ $income->student->school->direccion ?? 'No disponible' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Correo del plantel:</th>
                                                    <td>{{ $income->student->school->correo ?? 'No disponible' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Teléfono del plantel:</th>
                                                    <td>{{ $income->student->school->telefono ?? 'No disponible' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Rol:</th>
                                                    <td>{{ $income->student->rol->rol ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Departamento del rol:</th>
                                                    <td>{{ $income->student->rol->department->nombre ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Descripción del rol:</th>
                                                    <td>{{ $income->student->rol->descripcion ?? 'Sin descripción' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Carrera/Oferta:</th>
                                                    <td>{{ $income->student->offer->nombre ?? 'No asignada' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Fecha de nacimiento:</th>
                                                    <td>{{ $income->student->fecha_nacimiento ? date('d/m/Y', strtotime($income->student->fecha_nacimiento)) : 'No registrada' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Estado:</th>
                                                    <td>
                                                        @if($income->student->estado == '1')
                                                            <span class="badge bg-success">Activo</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if($income->student->fotografia)
                                                <tr>
                                                    <th>Fotografía:</th>
                                                    <td>
                                                        <img src="/storage/{{ $income->student->fotografia }}" alt="Foto" width="150" class="img-thumbnail">
                                                    </td>
                                                </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($income->con_worker && $income->worker)
                                    <div class="card mb-3">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="mb-0">Información del Trabajador</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="35%">Matrícula:</th>
                                                    <td>
                                                        <strong>
                                                            {{ substr($income->worker->id_institucional, 0, 2) . '-' .
                                                            substr($income->worker->id_institucional, 2, 3) . '-' .
                                                            substr($income->worker->id_institucional, 5, 4) }}
                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Nombre completo:</th>
                                                    <td><strong>{{ $income->worker->nombre }} {{ $income->worker->apellido_paterno }} {{ $income->worker->apellido_materno }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <th>Email institucional:</th>
                                                    <td>{{ $income->worker->email_institucional ?? 'No registrado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Plantel:</th>
                                                    <td>{{ $income->worker->school->plantel ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dirección del plantel:</th>
                                                    <td>{{ $income->worker->school->direccion ?? 'No disponible' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Correo del plantel:</th>
                                                    <td>{{ $income->worker->school->correo ?? 'No disponible' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Teléfono del plantel:</th>
                                                    <td>{{ $income->worker->school->telefono ?? 'No disponible' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Puesto:</th>
                                                    <td>{{ $income->worker->rol->rol ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Departamento del rol:</th>
                                                    <td>{{ $income->worker->rol->department->nombre ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Descripción del rol:</th>
                                                    <td>{{ $income->worker->rol->descripcion ?? 'Sin descripción' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Puesto/Oferta:</th>
                                                    <td>{{ $income->worker->offer->nombre ?? 'No asignado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Estado:</th>
                                                    <td>
                                                        @if($income->worker->estado == '1')
                                                            <span class="badge bg-success">Activo</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if($income->worker->fotografia)
                                                <tr>
                                                    <th>Fotografía:</th>
                                                    <td>
                                                        <img src="/storage/{{ $income->worker->fotografia }}" alt="Foto" width="150" class="img-thumbnail">
                                                    </td>
                                                </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($income->con_visitor && $income->visitor)
                                    <div class="card mb-3">
                                        <div class="card-header bg-info text-white">
                                            <h5 class="mb-0">Información del Visitante</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="35%">ID Visitante:</th>
                                                    <td><strong>{{ $income->visitor->id_visitante }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <th>Nombre completo:</th>
                                                    <td><strong>{{ $income->visitor->nombre }} {{ $income->visitor->apellido_paterno }} {{ $income->visitor->apellido_materno ?? '' }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <th>Motivo de visita:</th>
                                                    <td>{{ $income->visitor->motivo }}</td>
                                                </tr>
                                                <tr>
                                                    <th>¿Es menor de edad?</th>
                                                    <td>
                                                        @if($income->visitor->es_menor)
                                                            <span class="badge bg-warning">Sí</span>
                                                        @else
                                                            <span class="badge bg-success">No</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Identificación:</th>
                                                    <td>{{ $income->visitor->identificacion ?? 'No registrada' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Código QR:</th>
                                                    <td>
                                                        <code>{{ $income->visitor->code_qr }}</code>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Reactivación:</th>
                                                    <td>
                                                        @if($income->visitor->reactivacion)
                                                            <span class="badge bg-warning">Sí</span>
                                                        @else
                                                            <span class="badge bg-secondary">No</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Fechas de impresión:</th>
                                                    <td>
                                                        @php
                                                            $fechas = json_decode($income->visitor->fechas_impresion, true);
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
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if(!$income->con_student && !$income->con_worker && !$income->con_visitor)
                            <div class="alert alert-warning text-center">
                                <i class="fa fa-exclamation-triangle"></i> No hay información asociada a este ingreso.
                            </div>
                        @endif    
                                                        
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