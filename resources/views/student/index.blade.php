@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-6">
                <h5 class="fw-medium text-uppercase mb-0">Student Register</h5>
                <p class="fs-12">Student Register</p>
            </div>
            <div class="col-6 text-end">
                <a href="" class="btn btn-primary">Add New Student</a>
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