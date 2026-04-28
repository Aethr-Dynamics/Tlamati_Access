<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $rol?->rol) }}" id="rol" placeholder="Rol">
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <!-- <div class="form-group mb-2 mb20">
            <label for="id_department" class="form-label">{{ __('Id Department') }}</label>
            <input type="text" name="id_department" class="form-control @error('id_department') is-invalid @enderror" value="{{ old('id_department', $rol?->id_department) }}" id="id_department" placeholder="Id Department">
            {!! $errors->first('id_department', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> -->

        <div class="form-group mb-2 mb20">
            <label for="id_department" class="input-group mb-3 form-label">Departamento</label>

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
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $rol?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-3">
                <div class="form-group">
                    <a href="{{ route('rol.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-address-card" style="color: #E0E0E0;"></i> {{ __('Submit') }}</button>
                </div>
            </div>
        </div><!-- /.row -->
    </div>   
</div>