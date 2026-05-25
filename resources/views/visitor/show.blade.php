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
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="col-md-12">
                            <div class="form-group mb-2 mb20">
                                <label for="plantel" class="form-label">{{ __('Nombre') }}</label>
                                <div class="fs-5">
                                    {{ $visitor->nombre }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="direccion" class="form-label">{{ __('Apellido Paterno') }}</label>
                                <div class="fs-5">
                                    {{ $visitor->apellido_paterno }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="correo" class="form-label">{{ __('Apellido Materno') }}</label>
                                <div class="fs-5">
                                    {{ $visitor->apellido_materno }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="telefono" class="form-label">{{ __('Motivo') }}</label>
                                <div class="fs-5">
                                    {{ $visitor->motivo }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="es_menor" class="form-label">{{ __('Menor de edad') }}</label>
                                <div class="fs-5">
                                    {{ $visitor->es_menor == 1 ? 'Sí' : 'No' }}
                                </div>
                            </div>

                            <div class="form-group mb-2 mb20">
                                <label for="fechas_impresion" class="form-label">
                                    {{ __('Fechas Impresión') }}
                                </label>

                                <div class="fs-5">
                                    @forelse($visitor->fechas_impresion_formateadas as $fecha)
                                        <div>{{ $fecha }}</div>
                                    @empty
                                        <div>Sin registros</div>
                                    @endforelse
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row"><!-- row -->
                            <div class="col-md-4">
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
