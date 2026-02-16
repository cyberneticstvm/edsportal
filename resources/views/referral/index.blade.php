@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-6">
                <h5 class="fw-medium text-uppercase mb-0">Referral Register</h5>
                <p class="fs-12">Referral Register</p>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('eds.referral.create') }}" class="btn btn-primary">Add New Referral</a>
            </div>
        </div>
        <div class="row g-lg-12 g-3">
            <div class="col-lg-12">
                <table class="Data_Table table table-round align-middle mb-0 table-hover w-100 mt-2 border-top" id="apptTable">
                    <thead>
                        <tr>
                            <th class="py-2 fw-medium small text-uppercase">SL No</th>
                            <th class="py-2 fw-medium small text-uppercase">Action</th>
                            <th class="py-2 fw-medium small text-uppercase">Ref.Code</th>
                            <th class="py-2 fw-medium small text-uppercase">First Name</th>
                            <th class="py-2 fw-medium small text-uppercase">Last Name</th>
                            <th class="py-2 fw-medium small text-uppercase">Email</th>
                            <th class="py-2 fw-medium small text-uppercase">Course</th>
                            <th class="py-2 fw-medium small text-uppercase">Reg.Date</th>
                            <th class="py-2 fw-medium small text-uppercase">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($referrals as $key => $ref)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('eds.referral.edit', ['id' => encrypt($ref->id)]) }}">Edit</a></li>
                                        <li><a class="dropdown-item dlt" href="{{ route('eds.referral.delete', ['id' => encrypt($ref->id)]) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $ref->referral_code }}</td>
                            <td>{{ $ref->first_name }}</td>
                            <td>{{ $ref->last_name }}</td>
                            <td>{{ $ref->email }}</td>
                            <td>{{ $ref->course->name }}</td>
                            <td>{{ $ref->registration_date->format('d.M.Y') }}</td>
                            <td>{{ $ref->comments }}</td>
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