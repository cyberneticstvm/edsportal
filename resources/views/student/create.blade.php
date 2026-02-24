@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Update Student</h5>
                <p class="fs-12">Update Student</p>
            </div>
        </div>
        {{ html()->form('POST')->route('student.create')->class('')->open() }}
        <div class="row g-lg-12 g-3">
            <div class="control-group col-md-3">
                <label class="form-label req">Student Name </label>
                {{ html()->text('name', old('student'))->class('form-control')->required() }}
                @error('name')
                <small class="text-danger">{{ $errors->first('name') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Student Email </label>
                {{ html()->email('email', old('email'))->class('form-control')->required() }}
                @error('email')
                <small class="text-danger">{{ $errors->first('email') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Student Phone </label>
                {{ html()->text('phone', old('phone'))->class('form-control')->required() }}
                @error('phone')
                <small class="text-danger">{{ $errors->first('phone') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Response Date </label>
                {{ html()->date('response_date', old('response_date'))->class('form-control')->required() }}
                @error('response_date')
                <small class="text-danger">{{ $errors->first('response_date') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Course </label>
                {{ html()->select('course_id', $courses, old('course_id'))->class('form-control')->required() }}
                @error('course_id')
                <small class="text-danger">{{ $errors->first('course_id') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Status </label>
                {{ html()->select('status', $statuses, old('status'))->class('form-control')->required() }}
                @error('status')
                <small class="text-danger">{{ $errors->first('status') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Referred by </label>
                {{ html()->select('referred_by', $references, old('referred_by'))->class('form-control')->required() }}
                @error('referred_by')
                <small class="text-danger">{{ $errors->first('referred_by') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label">Comments </label>
                {{ html()->text('comments', old('comments'))->class('form-control') }}
                @error('comments')
                <small class="text-danger">{{ $errors->first('comments') }}</small>
                @enderror
            </div>
        </div>
        <div class="raw mt-3">
            <div class="col text-end">
                {{ html()->button('Cancel')->class('btn btn-secondary')->attribute('onclick', 'window.history.back()')->attribute('type', 'button') }}
                {{ html()->submit('Save')->class('btn btn-submit btn-primary') }}
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
@endsection