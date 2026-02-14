@extends("base")
@section("content")
<div class="col-12">
    <div class="mb-4 pt-3">
        <div class="row">
            <div class="col-6">
                <h5 class="fw-medium text-uppercase mb-0">Blog Register</h5>
                <p class="fs-12">Blog Register</p>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Add New Blog</a>
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
                            <th class="py-2 fw-medium small text-uppercase">Author</th>
                            <th class="py-2 fw-medium small text-uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $key => $blog)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('blog.edit', ['id' => encrypt($blog->id)]) }}">Edit</a></li>
                                        <li><a class="dropdown-item dlt" href="{{ route('blog.delete', ['id' => encrypt($blog->id)]) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->created_at->format('d.M.Y') }}</td>
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