<div class="offcanvas-body">
    <ul class="navbar-nav justify-content-start grow">
        <!--<li class="me-lg-3 nav-item"><a class="nav-link py-1 active" aria-current="page" href="#">Home</a></li>-->
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Front Desk</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="{{ route('index') }}" class="dropdown-item rounded-pill {{ (in_array(Route::currentRouteName(), ['index'])) ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('change.password') }}" class="dropdown-item rounded-pill">Account</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Certificate</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="{{ route('certificate.requests') }}" class="dropdown-item rounded-pill">Certificate Requests</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Feedback</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="{{ route('feedbacks') }}" class="dropdown-item rounded-pill">Manage Feedback</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Student</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="{{ route('students') }}" class="dropdown-item rounded-pill">Manage Student</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="{{ route('blogs') }}" class="dropdown-item rounded-pill">Manage Blog</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Job</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="" class="dropdown-item rounded-pill">Manage Job</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Referrals</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="" class="dropdown-item rounded-pill">Manage Referrals</a></li>
            </ul>
        </li>
        <li class="me-lg-3 nav-item dropdown">
            <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Other</a>
            <ul class="dropdown-menu p-2 p-xl-3 language shadow-lg rounded-4 li_animate">
                <li><a href="{{ route('form.submits') }}" class="dropdown-item rounded-pill">Form Submits</a></li>
                <li><a href="{{ route('file.uploads') }}" class="dropdown-item rounded-pill">File Uploads</a></li>
                <li><a href="" class="dropdown-item rounded-pill">Leads</a></li>
            </ul>
        </li>
    </ul>
</div>