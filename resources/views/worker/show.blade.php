@extends('layouts.admin')

@section('template_title')
    {{ $worker->name ?? __('Show') . " " . __('Worker') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Worker</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('worker.index') }}"> {{ __('Back') }}</a>
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
                                    <strong>Id School:</strong>
                                    {{ $worker->id_school }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Rol:</strong>
                                    {{ $worker->id_rol }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Offer:</strong>
                                    {{ $worker->id_offer }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $worker->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fotografia:</strong>
                                    {{ $worker->fotografia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code Qr:</strong>
                                    {{ $worker->code_qr }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
