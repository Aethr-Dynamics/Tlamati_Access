@extends('layouts.admin')

@section('template_title')
    {{ $worker->name ?? __('Show') . " " . __('Worker') }}
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
                            <span class="card-title">{{ __('Show') }} Worker</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $worker->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $worker->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $worker->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sede:</strong>
                                    {{ $worker->school->plantel ?? 'Sin sede' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol:</strong>
                                    {{ $worker->rol->rol ?? 'Sin rol' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Licenciatura:</strong>
                                    {{ $worker->offer->nombre ?? 'Sin licenciatura' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $worker->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fotografia:</strong>
                                    {{ $worker->fotografia }}
                                </div>

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
