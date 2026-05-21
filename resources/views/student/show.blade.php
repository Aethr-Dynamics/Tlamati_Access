@extends('layouts.admin')

@section('template_title')
    {{ $student->name ?? __('Show') . " " . __('Student') }}
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h4 class="mb-0">Estudiante: {{ $student->nombre }}</h4>
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
                            <span class="card-title">Información del estudiante</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <!-- <div class="row mb-3 text-center">
                            <div class="col-md-4 themed-grid-col">.col-md-4</div> 

                            <div class="col-md-8 themed-grid-col">
                                
                                <div class="row"> 
                                    <div class="col-md-6 themed-grid-col" style="text-align: left;">.col-md-6</div> 
                                    <div class="col-md-6 themed-grid-col" style="text-align: left;">.col-md-6</div> 
                                    <div class="col-md-6 themed-grid-col" style="text-align: left;">.col-md-6</div> 
                                    <div class="col-md-6 themed-grid-col" style="text-align: left;">.col-md-6</div> 
                                    <div class="col-md-6 themed-grid-col" style="text-align: left;">.col-md-6</div> 
                                    <div class="col-md-6 themed-grid-col" style="text-align: left;">.col-md-6</div> 
                                </div> 
                            </div> 
                        </div> -->

                        
                        <div class="row mb-3 text-center">
                            <div class="col-md-4 themed-grid-col">
                                <div class="form-group mb-2 mb20" style="text-align: center; align-items: center;">
                                    <img src="{{ asset('storage/' . $student->fotografia) }}" style=" height: 240px;">
                                </div>
                            </div> 

                            <div class="col-md-8 themed-grid-col">
                                
                                <div class="row"> 
                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Matrícula:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;">
                                        <p style="font-size: 20px;">
                                            {{ substr($student->id_institucional, 0, 2) . '-' .
                                            substr($student->id_institucional, 2, 3) . '-' .
                                            substr($student->id_institucional, 5, 4) }}
                                        </p>
                                    </div>

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Nombre:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->nombre }}</p></div> 

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Apellido Materno:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->apellido_materno }}</p></div> 

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Apellido Paterno:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->apellido_paterno }}</p></div> 

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Email:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->email_institucional }}</p></div> 

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Sede:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->school->plantel ?? 'Sin sede' }}</p></div> 

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Puesto:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->rol->rol ?? 'Sin rol' }}</p></div> 

                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Licenciatura:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->offer->nombre ?? 'Sin licenciatura' }}</p></div> 
                                    
                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Estado:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;">   
                                        @if($student->estado == 1)
                                            <p style="font-size: 20px; color: green;">Activo</p>
                                        @else
                                            <p style="font-size: 20px; color: red;">Inactivo</p>
                                        @endif                                    
                                    </div> 
                                    
                                    <div class="col-md-4 themed-grid-col" style="text-align: left;"><h4>Fecha Nacimiento:</h4></div> 
                                    <div class="col-md-8 themed-grid-col" style="text-align: left;"><p style="font-size: 20px;">{{ $student->fecha_nacimiento }}</p></div> 

                                </div> 
                            </div> 
                        </div>

                        <hr>
                        <div class="row"><!-- row -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{route('student.index')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div><!-- /.row -->  

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
