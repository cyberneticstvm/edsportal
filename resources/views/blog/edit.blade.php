@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Update Blog</h5>
                <p class="fs-12">Update Blog</p>
            </div>
        </div>
        {{ html()->form('POST')->route('blog.update', ['id' => encrypt($blog->id)])->class('')->open() }}
        <div class="row g-lg-12 g-3">
            <div class="control-group col-md-6">
                <label class="form-label req">Title </label>
                {{ html()->text('title', $blog->title)->class('form-control')->placeholder('Blog Title')->required() }}
                @error('title')
                <small class="text-danger">{{ $errors->first('title') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-6">
                <label class="form-label req">Author </label>
                {{ html()->text('author', $blog->author)->class('form-control')->placeholder('Blog Author')->required() }}
                @error('author')
                <small class="text-danger">{{ $errors->first('author') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-12">
                <label class="form-label req">Introduction Text (250 Chars) </label>
                {{ html()->textarea('intro', $blog->intro)->class('form-control')->placeholder('Blog Introduction')->required() }}
                @error('intro')
                <small class="text-danger">{{ $errors->first('intro') }}</small>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label req">Blog Content </label>
                {{ html()->textarea('content', $blog->content)->class('form-control')->attribute("id", "summernote")->placeholder('Blog Content')->required() }}
                @error('content')
                <small class="text-danger">{{ $errors->first('content') }}</small>
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