<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $offer?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
    <hr>    
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-3">
                <div class="form-group">
                    <a href="{{ route('offer.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-building-columns" style="color: #E0E0E0;"></i> {{ __('Submit') }}</button>
                </div>
            </div>
        </div><!-- /.row -->
    </div>    
</div>