@extends('layouts.admin')

@section('template_title')
    Nuevo departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default card-outline card-secondary">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Department</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('department.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('department.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
