@extends('layouts.admin')

@section('template_title')
    Nueva entrada
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Nueva entrada</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Income</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('income.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('income.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
