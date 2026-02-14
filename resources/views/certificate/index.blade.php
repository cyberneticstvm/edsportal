@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <h5 class="fw-medium text-uppercase mb-0">Certificate Request Register</h5>
        <p class="fs-12">Certificate Request Register</p>
        <div class="row g-lg-12 g-3">
            <div class="col-lg-12">
                <table class="Data_Table table table-round align-middle mb-0 table-hover w-100 mt-2 border-top" id="apptTable">
                    <thead>
                        <tr>
                            <th class="py-2 fw-medium small text-uppercase">SL No</th>
                            <th class="py-2 fw-medium small text-uppercase">Action</th>
                            <th class="py-2 fw-medium small text-uppercase">Status</th>
                            <th class="py-2 fw-medium small text-uppercase">Name</th>
                            <th class="py-2 fw-medium small text-uppercase">Email</th>
                            <th class="py-2 fw-medium small text-uppercase">Course</th>
                            <th class="py-2 fw-medium small text-uppercase">City</th>
                            <th class="py-2 fw-medium small text-uppercase">State</th>
                            <th class="py-2 fw-medium small text-uppercase">Country</th>
                            <th class="py-2 fw-medium small text-uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($certificates as $key => $certificate)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('print.certificate', ['id' => encrypt($certificate->id)]) }}" target="_blank">Print Certificate</a></li>
                                        @if($certificate->statuss->id == 15)
                                        <li><a class="dropdown-item proceed" href="{{ route('certificate.request.status.update', ['id' => encrypt($certificate->id), 'status' => encrypt(16)]) }}" target="_blank">Marked as Not Send</a></li>
                                        @else
                                        <li><a class="dropdown-item proceed" href="{{ route('certificate.request.status.update', ['id' => encrypt($certificate->id), 'status' => encrypt(15)]) }}" target="_blank">Marked as Sent</a></li>
                                        @endif
                                        <li><a class="dropdown-item dlt" href="{{ route('certificate.request.delete', ['id' => encrypt($certificate->id)]) }}" target="_blank">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $certificate->statuss->name }}</td>
                            <td>{{ $certificate->student_name }}</td>
                            <td>{{ $certificate->student_email }}</td>
                            <td>{{ $certificate->course->name }}</td>
                            <td>{{ $certificate->city }}</td>
                            <td>{{ $certificate->state }}</td>
                            <td>{{ $certificate->countryy->name }}</td>
                            <td>{{ $certificate->created_at->format('d.M.Y') }}</td>
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