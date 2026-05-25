<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Sección de Imagen -->
        <div class="row mb-4">
            <!-- Sección del Formulario -->
            <div class="col-md-12">
                
                <div class="form-group mb-2 mb20">
                    <label for="nombre" class="form-label">{{ __('Nombre') }} <span style="color: #FF6B6B;">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $offer?->nombre) }}" id="nombre" autocomplete="off" autofocus  placeholder="Nombre">
                    {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                
            </div>
        </div>
    </div>

    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-4">
                <div class="form-group text-center">
                    <a href="{{ route('offer.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"  style="color: #E0E0E0;"></i> {{ __('Guardar Cambios') }}</button>
                </div>
            </div>
        </div><!-- /.row --> 
    </div>
</div>
    