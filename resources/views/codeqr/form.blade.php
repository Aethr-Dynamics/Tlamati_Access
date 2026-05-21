<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_student" class="form-label">{{ __('Id Student') }}</label>
            <input type="text" name="id_student" class="form-control @error('id_student') is-invalid @enderror" value="{{ old('id_student', $codeqr?->id_student) }}" id="id_student" placeholder="Id Student">
            {!! $errors->first('id_student', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_worker" class="form-label">{{ __('Id Worker') }}</label>
            <input type="text" name="id_worker" class="form-control @error('id_worker') is-invalid @enderror" value="{{ old('id_worker', $codeqr?->id_worker) }}" id="id_worker" placeholder="Id Worker">
            {!! $errors->first('id_worker', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_visitor" class="form-label">{{ __('Id Visitor') }}</label>
            <input type="text" name="id_visitor" class="form-control @error('id_visitor') is-invalid @enderror" value="{{ old('id_visitor', $codeqr?->id_visitor) }}" id="id_visitor" placeholder="Id Visitor">
            {!! $errors->first('id_visitor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="access_token" class="form-label">{{ __('Access Token') }}</label>
            <input type="text" name="access_token" class="form-control @error('access_token') is-invalid @enderror" value="{{ old('access_token', $codeqr?->access_token) }}" id="access_token" placeholder="Access Token">
            {!! $errors->first('access_token', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="token_hash" class="form-label">{{ __('Token Hash') }}</label>
            <input type="text" name="token_hash" class="form-control @error('token_hash') is-invalid @enderror" value="{{ old('token_hash', $codeqr?->token_hash) }}" id="token_hash" placeholder="Token Hash">
            {!! $errors->first('token_hash', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="expires_at" class="form-label">{{ __('Expires At') }}</label>
            <input type="text" name="expires_at" class="form-control @error('expires_at') is-invalid @enderror" value="{{ old('expires_at', $codeqr?->expires_at) }}" id="expires_at" placeholder="Expires At">
            {!! $errors->first('expires_at', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_revoked" class="form-label">{{ __('Is Revoked') }}</label>
            <input type="text" name="is_revoked" class="form-control @error('is_revoked') is-invalid @enderror" value="{{ old('is_revoked', $codeqr?->is_revoked) }}" id="is_revoked" placeholder="Is Revoked">
            {!! $errors->first('is_revoked', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>