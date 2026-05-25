@extends('layouts.admin')

@section('template_title')
    Nuevo visitante
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Registrar un nuevo visitante</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default card-outline card-secondary">
                    <div class="card-header">
                        <span class="card-title">Nuevo visitante</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('visitor.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="row padding-1 p-1">
                                <div class="col-md-12">
                                    
                                    <div class="form-group mb-2 mb20">
                                        <label for="nombre" class="form-label">{{ __('Nombre') }} <span style="color: #FF6B6B;">*</span></label>
                                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $visitor?->nombre) }}" id="nombre" placeholder="Nombre" autocomplete="off" autofocus >
                                        {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }} <span style="color: #FF6B6B;">*</span></label>
                                        <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $visitor?->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno" autocomplete="off" autofocus >
                                        {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }} <span style="color: #FF6B6B;">*</span></label>
                                        <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $visitor?->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno" autocomplete="off" autofocus >
                                        {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="motivo" class="form-label">{{ __('Motivo') }} <span style="color: #FF6B6B;">*</span></label>
                                        <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo', $visitor?->motivo) }}" id="motivo" placeholder="Motivo" autocomplete="off" autofocus >
                                        {!! $errors->first('motivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="es_menor" class="form-label">{{ __('Menor de edad') }} <span style="color: #FF6B6B;">*</span></label>
                                        <!-- <input type="text" name="es_menor" class="form-control @error('es_menor') is-invalid @enderror" value="{{ old('es_menor', $visitor?->es_menor) }}" id="es_menor" placeholder="Es Menor" autocomplete="off" autofocus > -->
                                        <select name="es_menor" id="es_menor" 
                                                class="form-select form-control @error('es_menor') is-invalid @enderror">
                                            <option value="">Seleccione...</option>
                                            <option value="0" {{ old('es_menor', $visitor?->es_menor) == '0' ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ old('es_menor', $visitor?->es_menor) == '1' ? 'selected' : '' }}>Si</option>
                                        </select> 
                                        {!! $errors->first('es_menor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="identificacion" class="form-label">{{ __('Identificacion') }} <span style="color: #FF6B6B;">*</span></label>
                                        <input type="text" name="identificacion" class="form-control @error('identificacion') is-invalid @enderror" value="{{ old('identificacion', $visitor?->identificacion) }}" id="identificacion" placeholder="Identificacion" autocomplete="off" autofocus >
                                        {!! $errors->first('identificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>                           
                                </div>
                                
                                <hr>
                                <div class="col-md-12 mt20 mt-2">
                                    <div class="row"><!-- row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <a href="{{ route('visitor.index') }}" class="btn btn-secondary">Cancelar</a>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-save"  style="color: #E0E0E0;"></i> {{ __('Guardar Cambios') }}</button>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
