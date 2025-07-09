@extends('admin.head')
@section('content')
    <main>
        <div class="alert alert-warning mb-3" role="alert">
            Unapproved register student: {{ $total }}
        </div>

        @if (session('accept_success'))
            <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                {{ session('accept_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('delete_success'))
            <div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
                {{ session('delete_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->has('error'))
            <div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
                {{ $errors->first('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="register_table">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Class</th>

                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($registers as $register)
                        <tr>
                            <td>{{ $register->s_name }}</td>
                            <td>{{ $register->email }}</td>
                            <td>{{ $register->courses->course_name }}</td>
                            <td>{{ $register->classes->name }}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detail_info{{ $register->id }}">
                                    <i class="fa-solid fa-circle-info"></i> Detail
                                </button>

                                {{-- detail information  --}}
                                <div class="modal fade" id="detail_info{{ $register->id }}" tabindex="-1"
                                    aria-labelledby="detail_infoLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="bg-primary text-white py-2 text-center"> Student Information
                                                </h5>
                                                <div class="information">
                                                    <span>Name : <span> {{ $register->s_name }} </span> </span> <br>
                                                    <span>Email : <span> {{ $register->email }} </span> </span> <br>
                                                    <span>Phone number : <span> {{ $register->ph_number }} </span> </span>
                                                    <br>
                                                    <span>Course : <span> {{ $register->courses->course_name }}</span>
                                                    </span> <br>

                                                    <span>Class : <span> {{ $register->classes->name }} </span>
                                                        section</span> <br>
                                                    <span>Start Date : <span> {{ $register->classes->start_date }} </span> </span>
                                                    <br>
                                                    <span>Time : <span> {{ $register->classes->start_time }} -
                                                            {{ $register->classes->end_time }}
                                                        </span> </span> <br>

                                                    <span>Payment Phone : <span> {{ $register->payment_ph }} </span>
                                                    </span> <br>
                                                    <span>Payment Method : <span> {{ $register->payment_method }} </span>
                                                    </span>
                                                    <br>
                                                </div>
                                                <button type="button" class="btn btn-primary my-2" data-bs-dismiss="modal"
                                                    aria-label="Close">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- detail information  --}}

                                {{-- accept --}}
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#accept{{ $register->id }}">
                                    <i class="fa-solid fa-thumbs-up"></i> Accept
                                </button>
                                <div class="modal fade" id="accept{{ $register->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <h5 class="text-center">Do you want to <span
                                                        class="text-success">accept</span> {{ $register->s_name }} ?</h5>
                                                <div class="btns d-flex justify-content-evenly mt-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>

                                                    <a href="{{ route('admin_register_accept', $register->id) }}"
                                                        class="btn btn-success">Accept</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- Cancel   --}}
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancel{{ $register->id }}">
                                    <i class="fa-solid fa-trash"></i> Cancel
                                </button>
                                <div class="modal fade" id="cancel{{ $register->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <h5 class="text-center">Do you want to <span
                                                        class="text-danger">cancel</span> {{ $register->s_name }} ?</h5>
                                                <div class="btns d-flex justify-content-evenly mt-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <a href="{{ route('admin_register_cancel', $register->id) }}"
                                                        class="btn btn-danger">Cancel</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
