@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-6">
                <h5 class="fw-medium text-uppercase mb-0">Job Post Register</h5>
                <p class="fs-12">Job Post Register</p>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('job.create') }}" class="btn btn-primary">Add New Job</a>
            </div>
        </div>
        <div class="row g-lg-12 g-3">
            <div class="col-lg-12">
                <table class="Data_Table table table-round align-middle mb-0 table-hover w-100 mt-2 border-top" id="apptTable">
                    <thead>
                        <tr>
                            <th class="py-2 fw-medium small text-uppercase">SL No</th>
                            <th class="py-2 fw-medium small text-uppercase">Action</th>
                            <th class="py-2 fw-medium small text-uppercase">Title</th>
                            <th class="py-2 fw-medium small text-uppercase">Location</th>
                            <th class="py-2 fw-medium small text-uppercase">Posted On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $key => $job)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('job.edit', ['id' => encrypt($job->id)]) }}">Edit</a></li>
                                        <li><a class="dropdown-item dlt" href="{{ route('job.delete', ['id' => encrypt($job->id)]) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->location }}</td>
                            <td>{{ $job->posted_on->format('d.M.Y') }}</td>
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