@extends('admin.head')
@section('content')
    <main>
        <div class="container-fluid px-3">
            <a class="btn btn-secondary" href="javascript:history.back()">Back</a>

            <h5 class="my-3">Student List of {{ $class->name }} Section</h5>

            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Joined Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->s_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->ph_number }}</td>
                            <td>{{ $student->created_at }}</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash me-1"></i>Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection
