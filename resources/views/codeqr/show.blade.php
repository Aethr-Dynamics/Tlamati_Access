@extends('layouts.admin')

@section('template_title')
    {{ $codeqr->name ?? __('Show') . " " . __('Codeqr') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Codeqr</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('codeqr.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Student:</strong>
                                    {{ $codeqr->id_student }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Worker:</strong>
                                    {{ $codeqr->id_worker }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Visitor:</strong>
                                    {{ $codeqr->id_visitor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Access Token:</strong>
                                    {{ $codeqr->access_token }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Token Hash:</strong>
                                    {{ $codeqr->token_hash }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Expires At:</strong>
                                    {{ $codeqr->expires_at }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Revoked:</strong>
                                    {{ $codeqr->is_revoked }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
