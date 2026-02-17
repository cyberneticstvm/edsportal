@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Export Feedback</h5>
                <p class="fs-12">Export Feedback</p>
            </div>
        </div>
        {{ html()->form('POST')->route('feedback.export.fetch')->class('')->open() }}
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
                <label class="form-label">Status </label>
                {{ html()->select('status', $statuses, $inputs[2] ?? old('status'))->class('form-control')->placeholder("Select") }}
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
                <h5 class="fw-medium text-uppercase mb-0">Feedback Register</h5>
                <p class="fs-12">Feedback Register</p>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('feedback.export.excel', ['from_date' => $inputs[0], 'to_date' => $inputs[1], 'status' => $inputs[2]]) }}" class="btn btn-info">Export</a>
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
                            <th class="py-2 fw-medium small text-uppercase">Trainer</th>
                            <th class="py-2 fw-medium small text-uppercase">Course</th>
                            <th class="py-2 fw-medium small text-uppercase">Status</th>
                            <th class="py-2 fw-medium small text-uppercase">Date</th>
                            <th class="py-2 fw-medium small text-uppercase">Feedback</th>
                            <th class="py-2 fw-medium small text-uppercase">Location</th>
                            <th class="py-2 fw-medium small text-uppercase">Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($feedbacks as $key => $feedback)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item proceed" href="{{ route('feedback.status.update', ['id' => encrypt($feedback->id), 'status' => encrypt(12)]) }}">Approve</a></li>
                                        <li><a class="dropdown-item proceed" href="{{ route('feedback.status.update', ['id' => encrypt($feedback->id), 'status' => encrypt(13)]) }}">Pending</a></li>
                                        <li><a class="dropdown-item proceed" href="{{ route('feedback.status.update', ['id' => encrypt($feedback->id), 'status' => encrypt(14)]) }}">Decline</a></li>
                                        <li><a class="dropdown-item" href="{{ route('feedback.edit', ['id' => encrypt($feedback->id)]) }}">Edit</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $feedback->student_name }}</td>
                            <td>{{ $feedback->trainer_name }}</td>
                            <td>{{ $feedback->course->name }}</td>
                            <td>{{ $feedback->statuss->name }}</td>
                            <td>{{ $feedback->feedback_date->format('d.M.Y') }}</td>
                            <td>{{ $feedback->feedback }}</td>
                            <td>{{ $feedback->location }}</td>
                            <td>{{ $feedback->country }}</td>
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