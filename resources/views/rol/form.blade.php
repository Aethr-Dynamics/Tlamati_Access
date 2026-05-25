<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Sección de Imagen -->
        <div class="row mb-4">
            <!-- Sección del Formulario -->
            <div class="col-md-12">

                <div class="form-group mb-2 mb20">
                    <label for="rol" class="form-label">{{ __('Puesto') }} <span style="color: #FF6B6B;">*</span></label>
                    <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $rol?->rol) }}" autocomplete="off" autofocus id="rol" placeholder="Puesto">
                    {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                        
                <div class="form-group mb-2 mb20">
                    <label for="id_department" class="form-label">Departamento <span style="color: #FF6B6B;">*</span></label>

                    <select name="id_department" class="form-select form-control @error('id_department') is-invalid @enderror">
                        <option value="">Seleccione un departamento</option>

                        @foreach ($departments as $id => $nombre)
                            <option value="{{ $id }}"
                                {{ old('id_department', $rol?->id_department) == $id ? 'selected' : '' }}>
                                {{ $nombre }}
                            </option>
                        @endforeach
                    </select>

                    {!! $errors->first('id_department', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                </div>
                     
                <div class="form-group mb-2 mb20">
                    <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $rol?->descripcion) }}" autocomplete="off" autofocus id="descripcion" placeholder="Descripcion">
                    {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

            </div>
        </div>
    </div>

    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-4">
                <div class="form-group text-center">
                    <a href="{{ route('rol.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"  style="color: #E0E0E0;"></i> {{ __('Guardar Cambios') }}</button>
                </div>
            </div>
        </div><!-- /.row --> 
    </div>
</div>
