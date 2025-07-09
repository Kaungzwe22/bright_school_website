@extends('frontend.head')
@section('content')

    <style>
        .course_img{
            width: 100%;
            height: 250px;
            background-position: center;
            background-size: cover;
        }
    </style>

    <div class="courses d-flex my-4 ms-5">
        <div class="dropdown me-2">
            <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                All Courses
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">All Courses</a></li>
                <li><a class="dropdown-item" href="#">Webdevelopment</a></li>
                <li><a class="dropdown-item" href="#">Graphic Design</a></li>
            </ul>
        </div>
        <div class="search">
            <form action="" class="d-flex">
                <input class="form-control" type="search" placeholder="Student name...">
                <input class="btn btn-outline-dark" type="submit" value="Search">
            </form>
        </div>
    </div>

    <div class="container my-5">
        <div class="text-center my-5">
            <h1>Student Projects</h1>
            <p>You can find project demo and source codes if they are avaliable</p>
        </div>
        <div class="row">

            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="course_img" style="background-image:url('imgs/java_logo.png');">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ei Chaw May</h5>
                        <p>Project Title: <span class="fw-bold">Online pizza order Website</span></p>
                        <p class="card-text">Course: <span class="fw-bold">Webdesign & Development Beginner</span> </p>
                        <span class="card-text">Batch: <span class="fw-bold">10</span> </span>
                        <div class="links d-flex mt-3">
                            <a class="text-black text-center w-50" href="">
                                <i class="fa-solid fa-eye"></i>
                                View Demo
                            </a>
                            <a class="text-black text-center w-50" href="">
                                <i class="fa-brands fa-github"></i>
                                Source Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
