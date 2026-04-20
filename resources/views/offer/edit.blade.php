@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} Offer
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Offer</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('offer.update', $offer->id_offer) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('offer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
