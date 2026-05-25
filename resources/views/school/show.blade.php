@extends('layouts.admin')

@section('template_title')
    Información de la sede
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
                            <span class="card-title">{{ __('Información de la sede') }}</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="col-md-12">
                            <div class="form-group mb-2 mb20">
                                <label for="plantel" class="form-label">{{ __('Plantel') }}</label>
                                <div class="fs-5">
                                    {{ $school->plantel }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="direccion" class="form-label">{{ __('Dirección') }}</label>
                                <div class="fs-5">
                                    {{ $school->direccion }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="correo" class="form-label">{{ __('Correo') }}</label>
                                <div class="fs-5">
                                    {{ $school->correo }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                                <div class="fs-5">
                                    {{ $school->telefono }}
                                </div>
                            </div>

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
