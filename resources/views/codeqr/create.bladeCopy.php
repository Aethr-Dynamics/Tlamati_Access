@extends('layouts.admin')

@section('template_title')
    {{ __('Create') }} Codeqr
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Codeqr</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('codeqr.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('codeqr.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
