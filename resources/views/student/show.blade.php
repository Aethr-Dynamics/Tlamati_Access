@extends('layouts.admin')

@section('template_title')
    {{ $student->name ?? __('Show') . " " . __('Student') }}
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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Editar estudiante</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $student->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $student->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $student->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sede:</strong>
                                    {{ $student->school->plantel ?? 'Sin sede' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol:</strong>
                                    {{ $student->rol->rol ?? 'Sin rol' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Licenciatura:</strong>
                                    {{ $student->offer->nombre ?? 'Sin licenciatura' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $student->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Nacimiento:</strong>
                                    {{ $student->fecha_nacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fotografia:</strong>
                                    {{ $student->fotografia }}
                                </div>

                                <hr>
                                <div class="row"><!-- row -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="{{route('student.index')}}" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
