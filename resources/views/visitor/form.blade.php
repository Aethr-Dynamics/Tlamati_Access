<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $visitor?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
            <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $visitor?->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno">
            {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
            <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $visitor?->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno">
            {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="motivo" class="form-label">{{ __('Motivo') }}</label>
            <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo', $visitor?->motivo) }}" id="motivo" placeholder="Motivo">
            {!! $errors->first('motivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="es_menor" class="form-label">{{ __('Es Menor') }}</label>
            <input type="text" name="es_menor" class="form-control @error('es_menor') is-invalid @enderror" value="{{ old('es_menor', $visitor?->es_menor) }}" id="es_menor" placeholder="Es Menor">
            {!! $errors->first('es_menor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="identificacion" class="form-label">{{ __('Identificacion') }}</label>
            <input type="text" name="identificacion" class="form-control @error('identificacion') is-invalid @enderror" value="{{ old('identificacion', $visitor?->identificacion) }}" id="identificacion" placeholder="Identificacion">
            {!! $errors->first('identificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="code_qr" class="form-label">{{ __('Code Qr') }}</label>
            <input type="text" name="code_qr" class="form-control @error('code_qr') is-invalid @enderror" value="{{ old('code_qr', $visitor?->code_qr) }}" id="code_qr" placeholder="Code Qr">
            {!! $errors->first('code_qr', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reactivacion" class="form-label">{{ __('Reactivacion') }}</label>
            <input type="text" name="reactivacion" class="form-control @error('reactivacion') is-invalid @enderror" value="{{ old('reactivacion', $visitor?->reactivacion) }}" id="reactivacion" placeholder="Reactivacion">
            {!! $errors->first('reactivacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechas_impresion" class="form-label">{{ __('Fechas Impresion') }}</label>
            <input type="text" name="fechas_impresion" class="form-control @error('fechas_impresion') is-invalid @enderror" value="{{ old('fechas_impresion', $visitor?->fechas_impresion) }}" id="fechas_impresion" placeholder="Fechas Impresion">
            {!! $errors->first('fechas_impresion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-3">
                <div class="form-group">
                    <a href="{{ route('visitor.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-school-circle-check" style="color: #E0E0E0;"></i> {{ __('Submit') }}</button>
                </div>
            </div>
        </div><!-- /.row -->
</div>