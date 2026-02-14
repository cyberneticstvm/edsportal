@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Update Password</h5>
                <p class="fs-12">Update Password</p>
            </div>
        </div>
        {{ html()->form('POST')->route('update.password')->class('')->open() }}
        <div class="row g-lg-12 g-3">
            <div class="control-group col-md-3">
                <label class="form-label req">Current Password </label>
                {{ html()->password('old_password')->class('form-control')->placeholder('******')->required() }}
                @error('old_password')
                <small class="text-danger">{{ $errors->first('old_password') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">New Password </label>
                {{ html()->password('password')->class('form-control')->placeholder('******')->required() }}
                @error('password')
                <small class="text-danger">{{ $errors->first('password') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Confirm New Password </label>
                {{ html()->password('confirm_password')->class('form-control')->placeholder('******')->required() }}
                @error('confirm_password')
                <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
                @enderror
            </div>
        </div>
        <div class="raw mt-3">
            <div class="col text-end">
                {{ html()->button('Cancel')->class('btn btn-secondary')->attribute('onclick', 'window.history.back()')->attribute('type', 'button') }}
                {{ html()->submit('Update')->class('btn btn-submit btn-primary') }}
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection