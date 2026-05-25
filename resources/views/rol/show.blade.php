@extends('layouts.admin')

@section('template_title')
    Información del puesto
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Puesto: {{ $rol->rol }}</h3>
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
                            <span class="card-title">Información del puesto</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="col-md-12">
                            <div class="form-group mb-2 mb20">
                                <label for="rol" class="form-label">{{ __('Puesto') }}</label>
                                <div class="fs-5">
                                    {{ $rol->rol }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="id_department" class="form-label">{{ __('Departamento') }}</label>
                                <div class="fs-5">
                                    {{ $rol->department->nombre ?? 'Sin departamento' }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="descripcion" class="form-label">{{ __('Correo') }}</label>
                                <div class="fs-5">
                                    {{ $rol->descripcion }}
                                </div>
                            </div>

                        </div>
                                
                        <hr>
                        <div class="row"><!-- row -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{ route('rol.index') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div><!-- /.row --> 

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
