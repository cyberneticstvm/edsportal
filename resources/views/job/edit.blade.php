@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Update Job</h5>
                <p class="fs-12">Update Job</p>
            </div>
        </div>
        {{ html()->form('POST')->route('job.update', ['id' => encrypt($job->id)])->class('')->open() }}
        <div class="row g-lg-12 g-3">
            <div class="control-group col-md-12">
                <label class="form-label req">Job Title </label>
                {{ html()->text('title', $job->title)->class('form-control')->placeholder('Job Title')->required() }}
                @error('title')
                <small class="text-danger">{{ $errors->first('title') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-4">
                <label class="form-label req">Location </label>
                {{ html()->text('location', $job->location)->class('form-control')->placeholder('Location')->required() }}
                @error('location')
                <small class="text-danger">{{ $errors->first('location') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-4">
                <label class="form-label req">Contact email </label>
                {{ html()->email('contact_email', $job->contact_email)->class('form-control')->placeholder('Contact Email')->required() }}
                @error('contact_email')
                <small class="text-danger">{{ $errors->first('contact_email') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-4">
                <label class="form-label req">Posted Date </label>
                {{ html()->date('posted_on', $job->posted_on)->class('form-control')->required() }}
                @error('posted_on')
                <small class="text-danger">{{ $errors->first('posted_on') }}</small>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label req">Job Description </label>
                {{ html()->textarea('description', $job->description)->class('form-control')->attribute("id", "summernote")->placeholder('Job Description')->required() }}
                @error('description')
                <small class="text-danger">{{ $errors->first('description') }}</small>
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