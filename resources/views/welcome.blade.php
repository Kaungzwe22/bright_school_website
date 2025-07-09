@extends('frontend.head')
@section('content')
    <style>
        .home_bg {
            height: 80vh;
            background-image: url('imgs/main_photo.png');
            background-position: center;
            background-size: cover;

        }

        .home_text {
            background-color: rgba(0, 0, 0, 0.5);
            /* grey with 50% opacity */
        }

        .about span {
            font-size: 12px;
            border: 1px solid black;
            padding: 7px;
            border-radius: 5px
        }
    </style>

    <div class="home" style="margin-bottom: 200px">
        <div class="container-fluid home_bg">
            <div class="text-center w-100 home_text h-100 text-white d-flex align-items-center justify-content-center"
                style="">
                <div class="text">
                    <h2>WELCOME TO</h2>
                    <h1 class="my-4" style="font-size: 60px">OUR EDUCTATION CENTER</h1>
                    <p>Having the best Eductation in the whole world</p>
                    <a href="{{route('frontend_courses')}}" class="btn btn-light fw-bold">View Courses</a>
                </div>
            </div>
        </div>
    </div>

    <div class="about" style="margin-bottom: 200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-4">
                    <div class="text">
                        <span>OVERVIEW</span>
                        <h3 class="my-3">Developing caring learners who are <br> actively growing and achieving</h3>
                        <p>
                            At the heart of our educational philosophy lies a deep commitment to nurturing well-rounded
                            individuals. We strive to cultivate caring learners who not only demonstrate empathy and respect
                            for others.
                        </p>
                        <div class="row d-flex">
                            <div class="col-lg-6">
                                <i class="fa-solid fa-check-to-slot mt-1 me-2"></i>
                                <div class="box-text">
                                    <h5>Academic excellent</h5>
                                    <p class="text-justify">Our approach fosters an environment where students are actively
                                        engaged in their learning
                                        journey</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <i class="fa-solid fa-check-to-slot mt-1 me-2"></i>
                                <div class="box-text">
                                    <h5>Across the globe</h5>
                                    <p>We believe that by fostering both compassion and a growth mindset</p>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-dark">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-4">
                    <img class="w-100" src="{{ asset('imgs/about.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="courses" style="margin-bottom: 200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>We enter to learn, leave to achieve </h3>
                            <p class="my-3">We equip our students to thrive as responsible, successful, and contributing members of the global community.</p>
                            <h6 class="my-3">Visit Our campus</h6>
                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                No 108 Heldan Yangon
                            </p>
                            <p>
                                <i class="fa-solid fa-phone-volume"></i>
                                959 698026526
                            </p>
                            <p>
                                <i class="fa-solid fa-envelope"></i>
                                kzwe07407@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <img src="{{asset('imgs/photo02.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Courses</h5>
                            <p class="card-text text-justify">At the heart of our educational philosophy lies a deep commitment</p>
                            <a href="#" class="btn btn-dark">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <img src="{{asset('imgs/photo01.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Admission</h5>
                            <p class="card-text text-justify">At the heart of our educational philosophy lies a deep commitment</p>
                            <a href="#" class="btn btn-dark">View More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="address" style="margin-bottom: 200px;">
        <div class="container-fluid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14593.901139286005!2d96.12920411288245!3d16.822452275296534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1746257862799!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
