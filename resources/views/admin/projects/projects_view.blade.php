@extends('admin.head')
@section('content')

    <main>
        <div class="container mb-5">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-start">
                            <i class="fa-solid fa-list-check me-3 mt-1 fs-3"></i>
                            <span class="">Number of projects
                                <br> <h2>12</h2>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-start">
                            <i class="fa-solid fa-hourglass-start me-3 mt-1 fs-3"></i>
                            <span class="">Pending Projects
                                <br> <h2>34</h2>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h4 class="mb-4 text-primary"><i class="fa-solid fa-hourglass-start me-1"></i> Pending projects</h4>
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Student Name</th>
                    <th>Project Name</th>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ei Chaw May</td>
                    <td> Online Pizza Order Website </td>
                    <td> ICT Programming </td>
                    <td> 10 </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ::
                            </button>
                            <ul class="dropdown-menu">
                              <li class="pe-0"><a class="dropdown-item" href="{{route('admin_project_detail_view')}}"><i class="fa-solid fa-circle-info"></i> Detail</a></li>
                              <li class="pe-0"><a class="dropdown-item" href="#"><i class="fa-solid fa-check text-success"></i> Accept</a></li>
                              <li class="pe-0"><a class="dropdown-item" href="#"><i class="fa-solid fa-trash text-danger"></i> Cancel</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>


            </tbody>
        </table>
    </main>

@endsection
