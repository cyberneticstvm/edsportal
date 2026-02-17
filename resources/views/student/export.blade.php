@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Export Student</h5>
                <p class="fs-12">Export Student</p>
            </div>
        </div>
        {{ html()->form('POST')->route('student.export.fetch')->class('')->open() }}
        <div class="row g-lg-12 g-3">            
            <div class="control-group col-md-3">
                <label class="form-label req">From Date </label>
                {{ html()->date('from_date', $inputs[0] ?? old('from_date'))->class('form-control')->required() }}
                @error('from_date')
                <small class="text-danger">{{ $errors->first('from_date') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label req">To Date </label>
                {{ html()->date('to_date', $inputs[1] ?? old('to_date'))->class('form-control')->required() }}
                @error('to_date')
                <small class="text-danger">{{ $errors->first('to_date') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label">Course </label>
                {{ html()->select('course', $courses, $inputs[2] ?? old('course'))->class('form-control')->placeholder("Select") }}
                @error('course')
                <small class="text-danger">{{ $errors->first('course') }}</small>
                @enderror
            </div>
            <div class="control-group col-md-3">
                <label class="form-label">Status </label>
                {{ html()->select('status', $statuses, $inputs[3] ?? old('status'))->class('form-control')->placeholder("Select") }}
                @error('status')
                <small class="text-danger">{{ $errors->first('status') }}</small>
                @enderror
            </div>            
        </div>
        <div class="raw mt-3">
            <div class="col text-end">
                {{ html()->button('Cancel')->class('btn btn-secondary')->attribute('onclick', 'window.history.back()')->attribute('type', 'button') }}
                {{ html()->submit('Fetch')->class('btn btn-submit btn-primary') }}
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
</div>
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-6">
                <h5 class="fw-medium text-uppercase mb-0">Student Register</h5>
                <p class="fs-12">Student Register</p>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('student.export.excel', ['from_date' => $inputs[0], 'to_date' => $inputs[1], 'course' => $inputs[2], 'status' => $inputs[3]]) }}" class="btn btn-info">Export</a>
            </div>
        </div>
        <div class="row g-lg-12 g-3">
            <div class="col-lg-12">
                <table class="Data_Table table table-round align-middle mb-0 table-hover w-100 mt-2 border-top" id="apptTable">
                    <thead>
                        <tr>
                            <th class="py-2 fw-medium small text-uppercase">SL No</th>
                            <th class="py-2 fw-medium small text-uppercase">Action</th>
                            <th class="py-2 fw-medium small text-uppercase">Student</th>
                            <th class="py-2 fw-medium small text-uppercase">Email</th>
                            <th class="py-2 fw-medium small text-uppercase">Phone</th>
                            <th class="py-2 fw-medium small text-uppercase">Res.Date</th>
                            <th class="py-2 fw-medium small text-uppercase">Course</th>
                            <th class="py-2 fw-medium small text-uppercase">Status</th>
                            <th class="py-2 fw-medium small text-uppercase">Referred by</th>
                            <th class="py-2 fw-medium small text-uppercase">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $key => $student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('student.edit', ['id' => encrypt($student->id)]) }}">Edit</a></li>
                                        <li><a class="dropdown-item dlt" href="{{ route('student.delete', ['id' => encrypt($student->id)]) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->response_date->format('d.M.Y') }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->statuss->name }}</td>
                            <td>{{ $student->reference->name }}</td>
                            <td>{{ $student->comments }}</td>
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