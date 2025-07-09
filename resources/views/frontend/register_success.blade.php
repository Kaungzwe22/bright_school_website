@extends('frontend.head')
@section('content')
    <div class="container h-100 d-flex justify-content-center align-items-center my-5 px-2">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center mb-3">Register Completed</h4>
                <span>Thank you for your registion. Here is your registered information. </span> <br>
                <span>We will send you email if you are accepted for this class.</span>
                <hr>

                <div class="information">
                    <span>Name : <span> {{ $data['s_name'] }} </span> </span> <br>
                    <span>Email : <span> {{ $data['email'] }} </span> </span> <br>
                    <span>Phone number : <span> {{ $data['ph_number'] }} </span> </span> <br>
                    <span>Course : <span> {{ $course_name }} </span> </span> <br>
                    @foreach ($class_info as $info)
                        <span>Class : <span> {{ $info->name }} </span> section</span> <br>
                        <span>Start Date : <span> {{ $info->start_date }} </span> </span> <br>
                        <span>Time : <span> {{ $info->start_time }} - {{ $info->end_time }} </span> </span> <br>
                    @endforeach
                    <span>Payment Phone : <span> {{ $data['payment_ph'] }} </span> </span> <br>
                    <span>Payment Method : <span> {{ $data['payment_method'] }} </span> </span> <br>

                </div>

                <div class="btns my-3">
                    <a href="{{ route('frontend_home') }}" class="btn btn-primary">Done</a>
                </div>
            </div>
        </div>
    </div>
@endsection
