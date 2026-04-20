<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_worker" class="form-label">{{ __('Id Worker') }}</label>
            <input type="text" name="id_worker" class="form-control @error('id_worker') is-invalid @enderror" value="{{ old('id_worker', $income?->id_worker) }}" id="id_worker" placeholder="Id Worker">
            {!! $errors->first('id_worker', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_student" class="form-label">{{ __('Id Student') }}</label>
            <input type="text" name="id_student" class="form-control @error('id_student') is-invalid @enderror" value="{{ old('id_student', $income?->id_student) }}" id="id_student" placeholder="Id Student">
            {!! $errors->first('id_student', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_visitor" class="form-label">{{ __('Id Visitor') }}</label>
            <input type="text" name="id_visitor" class="form-control @error('id_visitor') is-invalid @enderror" value="{{ old('id_visitor', $income?->id_visitor) }}" id="id_visitor" placeholder="Id Visitor">
            {!! $errors->first('id_visitor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>