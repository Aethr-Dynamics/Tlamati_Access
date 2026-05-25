@extends('layouts.admin')

@section('template_title')
    Historial
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Historial de acceso</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historial') }}
                            </span>

                             <!-- <div class="float-right">
                                <a href="{{ route('attendance-log.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> -->
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
                                    <th>Tipo de Ingreso</th>
									<th > </th>
									<th >Nombre</th>
									<th >Estado</th>
									<th >Fecha / Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendanceLogs as $attendanceLog)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                        <!-- Tipo de usuario -->
                                        <td>
                                            @if($attendanceLog->user_type === 'student')

                                                <p class="badge bg-success"
                                                style="font-size: 12px; padding: 5px; font-weight: normal;">
                                                    Estudiante
                                                </p>

                                            @elseif($attendanceLog->user_type === 'worker')

                                                <p class="badge bg-primary"
                                                style="font-size: 12px; padding: 5px; font-weight: normal;">
                                                    Trabajador
                                                </p>

                                            @elseif($attendanceLog->user_type === 'visitor')

                                                <p class="badge bg-info"
                                                style="font-size: 12px; padding: 5px; font-weight: normal;">
                                                    Visitante
                                                </p>

                                            @else

                                                <p class="badge bg-secondary"
                                                style="font-size: 12px; padding: 5px; font-weight: normal;">
                                                    Desconocido
                                                </p>

                                            @endif
                                        </td>

                                        <!-- Fotografia de usuario -->
                                        <td style="text-align: center; align-items: center;"> 
                                            @if($attendanceLog->photo)
                                                <img src="{{ $attendanceLog->photo }}" style=" height: 70px;"> 
                                            @else
                                                <i class="fas fa-user-circle" style="color: rgb(38, 166, 154);"></i>
                                            @endif
                                        </td>

                                        <!-- Nombre de usuario -->
										<td >{{ $attendanceLog->full_name }}</td>

										
										<!-- <td >{{ $attendanceLog->action }}</td> -->
                                        <td>

                                            @if($attendanceLog->action === 'entry')

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

                                            @elseif($attendanceLog->action === 'exit')

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
										<td >{{ $attendanceLog->accessed_at }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('attendance-log.show', $attendanceLog->id) }}"><i class="fa fa-fw fa-eye" style="color: #E0E0E0"></i> {{ __('Show') }}</a>
                                                <!-- <a class="btn btn-sm btn-success" href="{{ route('attendance-log.edit', $attendanceLog->id) }}"><i class="fa fa-fw fa-edit" style="color: #E0E0E0"></i> {{ __('Edit') }}</a> -->
                                                <!-- <form action="{{ route('attendance-log.destroy', $attendanceLog->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $attendanceLogs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
