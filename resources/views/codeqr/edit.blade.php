@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Codeqr
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Codeqr</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('codeqrs.update', $codeqr->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('codeqr.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
