@extends('frontend.head')
@section('content')
    <style>
        .description li::marker {
            content: "► ";
            /* Set custom text or symbol */
            font-size: 1.2em;
            color: rgba(0, 0, 177, 0.663);
        }
    </style>

    <div class="container">
        <a href="javascript:history.back()" class="btn btn-secondary mt-3">
            < Back </a>
                <div class="row mb-5 mt-3 p-lg-5">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center align-items-center">
                        <div class="text-center">
                            <h1> {{ $course->course_name }} </h1>
                            <p> {{ $course->des }} </p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/public/' . $course->image) }}" alt="" class="w-50">
                    </div>
                </div>
    </div>

    <div class="about_course my-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 my-3">
                    <div class="card py-3 text-center">
                        <p><i class="fa-solid fa-calendar-days"></i> Period</p>
                        <h4>{{ $course->duration }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="card py-3 text-center">
                        <p><i class="fa-solid fa-hourglass-start"></i> Course Duration</p>
                        <h4>{{ $course->hours }} hrs</h4>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="card py-3 text-center">
                        <p><i class="fa-solid fa-dollar-sign"></i> Fees</p>
                        <div class="d-flex justify-content-center">
                            @if ($course->special_price != 0)
                                <s class="me-2">{{ $course->normal_price }}</s> / <h4 class="ms-2">{{ $course->special_price }} mmk</h4>
                            @else
                                <h4>{{ $course->normal_price }} mmk</h4>
                            @endif
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="description p-4">
        <div class="container card p-lg-5 p-3">
            <h4 class="mb-3">About this course</h4>
            <p> {!! $course->about !!} </p>
        </div>
    </div>

    <div class="included p-4">
        <div class="container card my-5 p-lg-5 p-3">
            <h4 class="mb-3">In this course</h4>
            <p> {!! $course->included !!} </p>
        </div>
    </div>

    <div class="timeTable mb-5">
        <div class="container text-center">
            <h3 class="mb-4">Time Table</h3>

            @if ($course->classes->isNotEmpty())
                <div class="table d-lg-flex justify-content-center">


                    @foreach ($course->classes as $class)
                        <div class="card m-2">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Start Date: </th>
                                        <td> {{ $class->start_date }} </td>
                                    </tr>
                                    <tr>
                                        <th>Time: </th>
                                        <td> {{ $class->start_time }} - {{ $class->end_time }} </td>
                                    </tr>
                                    <tr>
                                        <th>Section: </th>
                                        <td> {{ $class->name }} </td>
                                    </tr>
                                    <tr>
                                        <th>Avaliable Student: </th>
                                        <td>{{ $class->avaliable_stu }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Register form -->
                <div class="register_btn w-100 text-center">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enroll Now
                    </button>
                </div>
            @else
                <h5 class="tex-center text-danger">This course is not avaliable at this moment</h5>
            @endif

        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        {{-- Register form  --}}

                        <div class="card register-card p-4 bg-white">
                            <h3 class="form-title text-center mb-4"><i class="bi bi-pencil-square me-2"></i>
                                Register Form</h3>
                            <form method="POST" action="{{ route('frontend_register_post') }}">
                                @csrf
                                <!-- Course Name -->
                                <div class="mb-3">
                                    <label for="course_id" class="form-label">Course Name</label>
                                    <input value="{{ $course->course_name }}" type="text " class="form-control"
                                        id="course_id" readonly>
                                    <input value="{{ $course->id }}" type="text" class="d-none" id="course_id"
                                        name="course_id" required>

                                    @error('course_id')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <!-- Student Name -->
                                <div class="mb-3">
                                    <label for="studentName" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="studentName" name="s_name"
                                        placeholder="Enter your full name" required>

                                    @error('s_name')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="name@example.com" required>

                                    @error('email')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="ph_number"
                                        placeholder="09xxxxxxxxx" required>

                                    @error('ph_number')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <!-- Payment Phone Number -->
                                <div class="mb-3">
                                    <label for="paymentPhone" class="form-label">Payment Phone Number</label>
                                    <input type="tel" class="form-control" id="paymentPhone" name="payment_ph"
                                        placeholder="09xxxxxxxxx" required>

                                    @error('payment_ph')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <!-- Section -->
                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <select class="form-select" id="section" name="class_id" required>
                                        <option value="" selected disabled>Select your section</option>
                                        @if ($course->classes->isNotEmpty())
                                            @foreach ($course->classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }} :
                                                    {{ $class->start_date }}</option>
                                            @endforeach
                                        @endif

                                    </select>

                                    @error('class_id')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <!-- Payment Method -->
                                <div class="mb-4">
                                    <label class="form-label d-block">Payment Method</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="kbzPay" value="KBZ Pay" required>
                                        <label class="form-check-label" for="kbzPay"><i
                                                class="bi bi-wallet2 me-1"></i>KBZ Pay</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="wavePay" value="Wave Pay">
                                        <label class="form-check-label" for="wavePay"><i
                                                class="bi bi-phone me-1"></i>Wave Pay</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="ayaPay" value="Aya Pay">
                                        <label class="form-check-label" for="ayaPay"><i
                                                class="bi bi-credit-card me-1"></i>AYA
                                            Pay</label>
                                    </div>

                                    @error('payment_method')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>

                                {{-- kbz qr image  --}}
                                <div id="kbz_qr" class="d-none mb-3">
                                    <h6>Scan this code in KBZ</h6>
                                    <img class="w-25" src="{{ asset('imgs/kbz_qr.png') }}" alt="">
                                </div>

                                <figcaption class="blockquote-footer">
                                    Fill carefully before Submit
                                </figcaption>

                                <!-- Submit -->
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>


                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-1"></i> Enroll Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $('document').ready(function() {

            $('input[type=radio]').change(function() {
                if ($(this).attr('id') == 'kbzPay') {
                    $('#kbz_qr').removeClass('d-none')
                } else {
                    $('#kbz_qr').addClass('d-none')

                }
            })

        })
    </script>
@endsection
