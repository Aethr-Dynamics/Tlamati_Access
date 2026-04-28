@extends('layouts.admin')

@section('template_title')
    {{ $visitor->name ?? __('Show') . " " . __('Visitor') }}
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Visitante: {{ $visitor->nombre }}</h3>
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
                            <span class="card-title">{{ __('Show') }} Visitor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('visitor.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $visitor->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $visitor->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $visitor->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Motivo:</strong>
                                    {{ $visitor->motivo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Es Menor:</strong>
                                    {{ $visitor->es_menor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Identificacion:</strong>
                                    {{ $visitor->identificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code Qr:</strong>
                                    {{ $visitor->code_qr }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Reactivacion:</strong>
                                    {{ $visitor->reactivacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechas Impresion:</strong>
                                    {{ $visitor->fechas_impresion }}
                                </div>

                                <hr>
                                <div class="row"><!-- row -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="{{route('visitor.index')}}" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
