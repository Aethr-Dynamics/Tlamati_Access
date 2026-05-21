<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="plantel" class="form-label">{{ __('Plantel') }}</label>
            <input type="text" name="plantel" class="form-control @error('plantel') is-invalid @enderror" value="{{ old('plantel', $school?->plantel) }}" id="plantel" placeholder="Plantel">
            {!! $errors->first('plantel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $school?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $school?->correo) }}" id="correo" placeholder="Correo">
            {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $school?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-3">
                <div class="form-group">
                    <a href="{{ route('school.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-school-circle-check" style="color: #E0E0E0;"></i> {{ __('Submit') }}</button>
                </div>
            </div>
        </div><!-- /.row -->
    </div>    
</div>