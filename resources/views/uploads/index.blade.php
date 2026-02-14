@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Document Register</h5>
                <p class="fs-12">Document Register</p>
            </div>
            <div class="col-12">
                <div class="row g-lg-12 g-3">
                    <div class="control-group col-md-4">
                        {{ html()->form('POST')->route('file.upload.save')->class('d-flex')->attribute('role', 'search')->acceptsFiles()->open() }}
                        {{ html()->file('document')->class('form-control')->required() }}
                        {{ html()->submit('Upload')->class('btn btn-submit btn-primary') }}
                        {{ html()->form()->close() }}
                        @error('document')
                        <small class="text-danger">{{ $errors->first('document') }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-lg-12 g-3">
            <div class="col-lg-12">
                <table class="Data_Table table table-round align-middle mb-0 table-hover w-100 mt-2 border-top" id="apptTable">
                    <thead>
                        <tr>
                            <th class="py-2 fw-medium small text-uppercase">SL No</th>
                            <th class="py-2 fw-medium small text-uppercase">Action</th>
                            <th class="py-2 fw-medium small text-uppercase">Name</th>
                            <th class="py-2 fw-medium small text-uppercase">Type</th>
                            <th class="py-2 fw-medium small text-uppercase">Url</th>
                            <th class="py-2 fw-medium small text-uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($files as $key => $file)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item dlt" href="{{ route('file.upload.delete', ['id' => encrypt($file->id)]) }}">Delete</a></li>
                                        <li><a class="dropdown-item" href="{{ route('file.download', ['id' => encrypt($file->id)]) }}">Download</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $file->file_name }}</td>
                            <td>{{ $file->file_type }}</td>
                            <td>{{ $file->url }}</td>
                            <td>{{ $file->created_at->format('d.M.Y') }}</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection