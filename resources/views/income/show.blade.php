@extends('layouts.admin')

@section('template_title')
    {{ $income->name ?? __('Show') . " " . __('Income') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Income</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('income.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Worker:</strong>
                                    {{ $income->id_worker }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Student:</strong>
                                    {{ $income->id_student }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Visitor:</strong>
                                    {{ $income->id_visitor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
