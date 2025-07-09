@extends('frontend.head')
@section('content')

    <div class="about" style="margin: 50px 0px">
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

@endsection
