@extends('layouts.admin')

@section('template_title')
    Editar visitante
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
        <div class="">
            <div class="col-md-12">

                <div class="card card-default card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">Actualizar visitante</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('visitor.update', $visitor->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('visitor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
