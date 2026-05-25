@extends('layouts.admin')

@section('template_title')
    {{ __('Create') }} Attendance Log
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Attendance Log</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('attendance-log.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('attendance-log.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
