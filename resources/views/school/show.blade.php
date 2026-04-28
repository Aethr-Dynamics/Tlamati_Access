@extends('layouts.admin')

@section('template_title')
    {{ $school->name ?? __('Show') . " " . __('School') }}
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Sede: {{ $school->plantel }}</h3>
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
                            <span class="card-title">{{ __('Show') }} School</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Plantel:</strong>
                                    {{ $school->plantel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $school->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $school->correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $school->telefono }}
                                </div>

                                <hr>
                                <div class="row"><!-- row -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="{{route('school.index')}}" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->  

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
