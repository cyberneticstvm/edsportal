@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Update Feedback</h5>
                <p class="fs-12">Update Feedback</p>
            </div>
        </div>
        {{ html()->form('POST')->route('feedback.update', ['id' => encrypt($feedback->id)])->class('')->open() }}
        <div class="row g-lg-12 g-3">
            <div class="control-group col-md-3">
                <label class="form-label req">Student Name </label>
                {{ html()->text('student_name', $feedback->student_name)->class('form-control')->required() }}
                @error('student_name')
                <small class="text-danger">{{ $errors->first('student_name') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Trainer Name </label>
                {{ html()->text('trainer_name', $feedback->trainer_name)->class('form-control')->required() }}
                @error('trainer_name')
                <small class="text-danger">{{ $errors->first('trainer_name') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Course </label>
                {{ html()->select('course_id', $courses, $feedback->course_id)->class('form-control')->required() }}
                @error('course_id')
                <small class="text-danger">{{ $errors->first('course_id') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Location </label>
                {{ html()->text('location', $feedback->location)->class('form-control')->required() }}
                @error('location')
                <small class="text-danger">{{ $errors->first('location') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Country </label>
                {{ html()->text('country', $feedback->country)->class('form-control')->required() }}
                @error('country')
                <small class="text-danger">{{ $errors->first('country') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">Status </label>
                {{ html()->select('status', $statuses, $feedback->status)->class('form-control')->required() }}
                @error('status')
                <small class="text-danger">{{ $errors->first('status') }}</small>
                @enderror
            </div>
            <div class="col-md-9">
                <label class="form-label req">Feedback </label>
                {{ html()->textarea('feedback', $feedback->feedback)->rows(5)->class('form-control')->placeholder('Feedback')->required() }}
                @error('feedback')
                <small class="text-danger">{{ $errors->first('feedback') }}</small>
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