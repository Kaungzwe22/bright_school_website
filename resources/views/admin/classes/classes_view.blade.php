@extends('admin.head')
@section('content')
    <main>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin_classes_create_view') }}" class="btn btn-primary my-3">Add New Class <i
                class="fa-solid fa-plus"></i></a>

        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Start Date / End Date</th>
                    <th>Course Name</th>
                    <th>Registered Student</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($classes as $class)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->start_time }} - {{ $class->end_time }}</td>
                        <td>{{ $class->start_date }} / {{ $class->end_date }}</td>
                        <td>{{ $class->courses->course_name }}</td>
                        <td>{{ $class->registered_students_count }} - {{ $class->avaliable_stu }} is Max</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle py-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    ::
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="pe-0"><a class="dropdown-item"
                                            href="{{ route('admin_classes_student_list', $class->id) }}"><i
                                                class="fa-solid fa-users"></i> Students</a></li>
                                    <li class="pe-0"><a class="dropdown-item"
                                            href="{{ route('admin_classes_detail', $class->id) }}"><i
                                                class="fa-solid fa-circle-info"></i> Detail</a></li>
                                    <li class="pe-0"><a class="dropdown-item"
                                            href="{{ route('admin_classes_delete', $class->id) }}"><i
                                                class="fa-solid fa-trash text-danger"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </main>
@endsection
