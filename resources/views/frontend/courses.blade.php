@extends('frontend.head')
@section('content')
    <style>
        .course_img {
            width: 100%;
            height: 250px;
            background-position: center;
            background-size: cover;
        }
    </style>
    <main>

        <div class="courses d-flex my-4 ms-5">
            <div class="dropdown me-2">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    All Courses
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">All Courses</a></li>
                    @foreach ($course_types as $course_type)
                        <li><a class="dropdown-item" href="{{ route('frontend_courses', $course_type->id) }}">
                                {{ $course_type->name }}
                            </a></li>
                    @endforeach

                </ul>
            </div>
            <div class="search">
                <form method="POST" action="{{ route('course_search') }}" class="d-flex" role="search">
                    @csrf
                    <input name="course_name" required class="form-control me-2" type="search" placeholder="Search courses"
                        aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="container my-5">
            <div class="text-center my-5">

            </div>
            <div class="row">
                @if (empty($courses) || $courses->isEmpty())
                    <h4 class="text-center">No Course Avaliable at this moment</h4>
                @else
                    @foreach ($courses as $course)
                        <div class="col-lg-4 mt-3">
                            <div class="card">
                                <div class="course_img"
                                    style="background-image: url('{{ asset('storage/public/' . $course->image) }}');"></div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->course_name }}</h5>
                                    @if ($course->special_price != 0)
                                        <p class="card-text">Fees: <s>{{ $course->normal_price }}</s> / <span
                                                class="fw-bold">{{ $course->special_price }}</span> mmk</p>
                                    @else
                                        <p class="card-text">Fees: <span>{{ $course->normal_price }}</span> mmk</p>
                                    @endif

                                    <a href="{{ route('frontend_courses_detail', $course->id) }}"
                                        class="btn btn-outline-dark">View More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif




            </div>
        </div>
    </main>
@endsection
