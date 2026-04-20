@extends('layouts.admin')

@section('template_title')
    {{ $student->name ?? __('Show') . " " . __('Student') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('student.index') }}"> {{ __('Back') }}</a>
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
                                    <strong>Id School:</strong>
                                    {{ $student->id_school }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Rol:</strong>
                                    {{ $student->id_rol }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Offer:</strong>
                                    {{ $student->id_offer }}
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
                                <div class="form-group mb-2 mb20">
                                    <strong>Code Qr:</strong>
                                    {{ $student->code_qr }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
