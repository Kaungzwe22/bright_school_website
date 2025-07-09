<div class="sticky-top" style="box-shadow: 0px 2px 2px grey">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend_home') }}">
                <img src="{{ asset('imgs/logo.jpg') }}" class="" style="width: 50px;" alt="">
                Bright Edu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center w-100">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontend_home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('frontend_courses') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Courses
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($course_types as $course_type)
                                <li><a class="dropdown-item" href="{{ route('frontend_courses', $course_type->id) }}">{{ $course_type->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend_projects') }}">Projects</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('course_search') }}" class="d-flex" role="search">
                    @csrf
                    <input name="course_name" required class="form-control me-2" type="search" placeholder="Search courses" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</div>
