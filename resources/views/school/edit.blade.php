@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} School
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} School</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('school.update', $school->id_school) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('school.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
