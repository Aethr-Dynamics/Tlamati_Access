@extends('layouts.admin')

@section('template_title')
    {{ $department->name ?? __('Show') . " " . __('Department') }}
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Departamento: {{ $department->nombre }}</h3>
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
                            <span class="card-title">{{ __('Información dle departamento') }}</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="col-md-12">
                            <div class="form-group mb-2 mb20">
                                <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                <div class="fs-5">
                                    {{ $department->nombre }}
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row"><!-- row -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{route('department.index')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div><!-- /.row -->  

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
