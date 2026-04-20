<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre_oferta" class="form-label">{{ __('Nombre Oferta') }}</label>
            <input type="text" name="nombre_oferta" class="form-control @error('nombre_oferta') is-invalid @enderror" value="{{ old('nombre_oferta', $offer?->nombre_oferta) }}" id="nombre_oferta" placeholder="Nombre Oferta">
            {!! $errors->first('nombre_oferta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>