<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_student" class="form-label">{{ __('Id Student') }}</label>
            <input type="number" name="id_student" class="form-control @error('id_student') is-invalid @enderror" value="{{ old('id_student', $income?->id_student) }}" id="id_student" autocomplete="off" autofocus  placeholder="Id Student">
            {!! $errors->first('id_student', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_worker" class="form-label">{{ __('Id Worker') }}</label>
            <input type="number" name="id_worker" class="form-control @error('id_worker') is-invalid @enderror" value="{{ old('id_worker', $income?->id_worker) }}" id="id_worker" autocomplete="off" autofocus  placeholder="Id Worker">
            {!! $errors->first('id_worker', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_visitor" class="form-label">{{ __('Id Visitor') }}</label>
            <input type="number" name="id_visitor" class="form-control @error('id_visitor') is-invalid @enderror" value="{{ old('id_visitor', $income?->id_visitor) }}" id="id_visitor" autocomplete="off" autofocus  placeholder="Id Visitor">
            {!! $errors->first('id_visitor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
    <hr>
    <div class="col-md-12 mt20 mt-2">
        <div class="row"><!-- row -->
            <div class="col-md-3">
                <div class="form-group">
                    <a href="{{ route('income.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-school-circle-check" style="color: #E0E0E0;"></i> {{ __('Submit') }}</button>
                </div>
            </div>
        </div><!-- /.row -->  
</div>