@extends('layouts.admin')

@section('template_title')
    {{ $income->name ?? __('Show') . " " . __('Income') }}
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
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Información de entrada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('incomes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Con Worker:</strong>
                                    {{ $income->con_worker }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Con Student:</strong>
                                    {{ $income->con_student }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Con Visitor:</strong>
                                    {{ $income->con_visitor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Student:</strong>
                                    {{ $income->id_student }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Worker:</strong>
                                    {{ $income->id_worker }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Visitor:</strong>
                                    {{ $income->id_visitor }}
                                </div>

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
