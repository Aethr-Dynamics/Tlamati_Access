<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $worker?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
            <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $worker?->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno">
            {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
            <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $worker?->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno">
            {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_school" class="input-group mb-3 form-label">Sede</label>

            <select name="id_school" class="form-select form-control @error('id_school') is-invalid @enderror">
                <option value="">Seleccione una sede</option>

                @foreach ($schools as $id => $plantel)
                    <option value="{{ $id }}"
                        {{ old('id_school', $worker?->id_school) == $id ? 'selected' : '' }}>
                        {{ $plantel }}
                    </option>
                @endforeach
            </select>

            {!! $errors->first('id_school', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_rol" class="input-group mb-3 form-label">Rol</label>

            <select name="id_rol" class="form-select form-control @error('id_rol') is-invalid @enderror">
                <option value="">Seleccione una sede</option>

                @foreach ($rols as $id => $rol)
                    <option value="{{ $id }}"
                        {{ old('id_rol', $worker?->id_rol) == $id ? 'selected' : '' }}>
                        {{ $rol }}
                    </option>
                @endforeach
            </select>

            {!! $errors->first('id_rol', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_offer" class="input-group mb-3 form-label">Rol</label>

            <select name="id_offer" class="form-select form-control @error('id_offer') is-invalid @enderror">
                <option value="">Seleccione una sede</option>

                @foreach ($offers as $id => $nombre)
                    <option value="{{ $id }}"
                        {{ old('id_offer', $worker?->id_offer) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>

            {!! $errors->first('id_offer', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $worker?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fotografia" class="form-label">{{ __('Fotografia') }}</label>
            <input type="text" name="fotografia" class="form-control @error('fotografia') is-invalid @enderror" value="{{ old('fotografia', $worker?->fotografia) }}" id="fotografia" placeholder="Fotografia">
            {!! $errors->first('fotografia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-3">
                <div class="form-group">
                    <a href="{{ route('worker.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-school-circle-check" style="color: #E0E0E0;"></i> {{ __('Submit') }}</button>
                </div>
            </div>
        </div><!-- /.row -->    
</div>