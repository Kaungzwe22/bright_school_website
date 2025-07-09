@extends('admin.head')
@section('content')
    <main>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="course_type mb-3 mt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card shadow rounded-4">
                            <div class="card-header bg-primary text-white text-center rounded-top-4">
                                <h5 class="mb-0">Add Course Type</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin_course_type_add') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Course Type Name</label>
                                        <input value="{{ old('name') }}" type="text" class="form-control"
                                            id="name" name="name" placeholder="e.g. Web Development" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add Course Type</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course_types as $course_type)
                                    <tr>
                                        <td>{{ $course_type->id }}</td>
                                        <td>{{ $course_type->name }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $course_type->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i> <span class="d-lg-inline d-none">Edit</span>
                                            </button>

                                            <div class="modal fade" id="exampleModal{{ $course_type->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <form action="{{ route('admin_course_type_edit', $course_type->id) }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Course Type
                                                                        Name</label>
                                                                    <input value="{{ $course_type->name }}" type="text"
                                                                        class="form-control" id="name" name="name"
                                                                        placeholder="e.g. Web Development" required>
                                                                    @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-primary">Edit
                                                                        Course Type</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- delete  --}}

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#course_type_delete{{ $course_type->id }}">
                                                <i class="fa-solid fa-trash"></i> <span class="d-lg-inline d-none">Delete</span>
                                            </button>

                                            <div class="modal fade" id="course_type_delete{{ $course_type->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <h5 class="text-center py-2">Are you Sure you want to delete <br>
                                                                "{{ $course_type->name }}" ?
                                                            </h5>
                                                            <div class="d-flex justify-content-evenly">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    No
                                                                </button>
                                                                <a href="{{ route('admin_course_type_delete', $course_type->id) }}" class="btn btn-danger">
                                                                    Yes
                                                                </a>
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
                </div>
            </div>

        </div>


        <a href="{{ route('admin_courses_create_view') }}" class="btn btn-primary my-3">Add New Course <i
                class="fa-solid fa-plus"></i></a>

        <table id="myTable2" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Normal Price</th>
                    <th>Special Price</th>
                    <th>Duration</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td><span>{{ $course->normal_price }}</span> mmk </td>
                        <td><span>{{ $course->special_price }}</span> mmk </td>
                        <td> <span>{{ $course->duration }}</span> Month</td>
                        <td> {{ $course->courseType->name }} </td>
                        <td>

                            <a href="{{ route('admin_course_edit_view',$course->id ) }}" class="btn btn-primary">
                                <i class="fa-solid fa-pen-to-square"></i> <span class="d-lg-inline d-none">Edit</span>
                            </a>

                            {{-- delete  --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#course_type_delete{{ $course_type->id }}">
                                <i class="fa-solid fa-pen-to-square"></i> <span class="d-lg-inline d-none">Delete</span>
                            </button>

                            <div class="modal fade" id="course_type_delete{{ $course_type->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <h5 class="text-center py-2">Are you Sure you want to delete <br>
                                                " {{ $course->course_name }} " ?
                                            </h5>
                                            <div class="d-flex justify-content-evenly">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    No
                                                </button>
                                                <a href="" class="btn btn-danger">
                                                    Yes
                                                </a>
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

    </main>
@endsection
