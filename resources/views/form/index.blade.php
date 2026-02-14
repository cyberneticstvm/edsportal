@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-medium text-uppercase mb-0">Form Submit Register</h5>
                <p class="fs-12">Form Submit Register</p>
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
                            <th class="py-2 fw-medium small text-uppercase">Email</th>
                            <th class="py-2 fw-medium small text-uppercase">Phone</th>
                            <th class="py-2 fw-medium small text-uppercase">Message</th>
                            <th class="py-2 fw-medium small text-uppercase">Type</th>
                            <th class="py-2 fw-medium small text-uppercase">Course</th>
                            <th class="py-2 fw-medium small text-uppercase">Trainer</th>
                            <th class="py-2 fw-medium small text-uppercase">City</th>
                            <th class="py-2 fw-medium small text-uppercase">Country</th>
                            <th class="py-2 fw-medium small text-uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($forms as $key => $form)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item dlt" href="{{ route('form.submit.delete', ['id' => encrypt($form->id)]) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $form->contact_name }}</td>
                            <td>{{ $form->contact_email }}</td>
                            <td>{{ $form->contact_phone }}</td>
                            <td>{!! $form->message !!}</td>
                            <td>{{ $form->typee?->name }}</td>
                            <td>{{ $form->course }}</td>
                            <td>{{ $form->trainer }}</td>
                            <td>{{ $form->city }}</td>
                            <td>{{ $form->country }}</td>
                            <td>{{ $form->created_at->format('d.M.Y') }}</td>
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