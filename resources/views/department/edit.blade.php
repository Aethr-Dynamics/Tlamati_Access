@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} Department
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Department</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('department.update', $department->id_department) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('department.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
