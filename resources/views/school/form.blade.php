<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Sección de Imagen -->
        <div class="row mb-4">
            <!-- Sección del Formulario -->
            <div class="col-md-12">

                <div class="form-group mb-2 mb20">
                    <label for="plantel" class="form-label">{{ __('Plantel') }} <span style="color: #FF6B6B;">*</span></label>
                    <input type="text" name="plantel" class="form-control @error('plantel') is-invalid @enderror" value="{{ old('plantel', $school?->plantel) }}" autocomplete="off" autofocus id="plantel" placeholder="Plantel">
                    {!! $errors->first('plantel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="direccion" class="form-label">{{ __('Direccion') }} <span style="color: #FF6B6B;">*</span></label>
                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $school?->direccion) }}" autocomplete="off" autofocus id="direccion" placeholder="Direccion">
                    {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="correo" class="form-label">{{ __('Correo') }}</label>
                    <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $school?->correo) }}" autocomplete="off" autofocus id="correo" placeholder="Correo">
                    {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $school?->telefono) }}" autocomplete="off" autofocus id="telefono" placeholder="Telefono">
                    {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                
            </div>
        </div>
    </div>

    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-4">
                <div class="form-group text-center">
                    <a href="{{ route('school.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save" style="color: #E0E0E0;"></i> {{ __('Guardar Cambios') }}</button>
                </div>
            </div>
        </div><!-- /.row --> 
    </div>
</div>
