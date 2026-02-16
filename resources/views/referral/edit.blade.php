@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Update Referral</h5>
                <p class="fs-12">Update Referral</p>
            </div>
        </div>
        {{ html()->form('POST')->route('eds.referral.update', ['id' => encrypt($referral->id)])->class('')->open() }}
        <div class="row g-lg-12 g-3">
            <div class="control-group col-md-3">
                <label class="form-label req">First Name </label>
                {{ html()->text('first_name', $referral->first_name)->class('form-control')->placeholder('First Name')->required() }}
                @error('first_name')
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Last Name </label>
                {{ html()->text('last_name', $referral->last_name)->class('form-control')->placeholder('Last Name')->required() }}
                @error('last_name')
                <small class="text-danger">{{ $errors->first('last_name') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Email </label>
                {{ html()->email('email', $referral->email)->class('form-control')->placeholder('Email')->required() }}
                @error('email')
                <small class="text-danger">{{ $errors->first('email') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Course </label>
                {{ html()->select('course_id', $courses, $referral->course_id)->class('form-control')->required() }}
                @error('course_id')
                <small class="text-danger">{{ $errors->first('course_id') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-2">
                <label class="form-label req">Registration Date </label>
                {{ html()->date('registration_date', $referral->registration_date)->class('form-control')->required() }}
                @error('registration_date')
                <small class="text-danger">{{ $errors->first('registration_date') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-4">
                <label class="form-label">Comments </label>
                {{ html()->text('comments', $referral->comments)->class('form-control')->placeholder('Comments') }}
                @error('comments')
                <small class="text-danger">{{ $errors->first('comments') }}</small>
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