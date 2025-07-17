@extends('admin.head')
@section('content')
    <main>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_classes_edit', $class->id) }}" method="POST">
                        @csrf
                        <!-- Choose Course -->
                        <div class="mb-3">
                            <label for="course" class="form-label">Choose Course</label>
                            <select class="form-select" id="course" name="course_id">
                                <option value="{{ $class->courses->id }} " selected > {{ $class->courses->course_name }} </option>
                                <option disabled>-- Select a course --</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"> {{ $course->course_name }} </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Eg. Mon-Tue Morning" value="{{ $class->name }}">
                            @error('name')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Time inputs -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="start_time" name="start_time"
                                    value="{{ $class->start_time }}">
                            </div>
                            @error('start_time')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="col-md-6 mb-3">
                                <label for="end_time" class="form-label">End Time</label>
                                <input type="time" class="form-control" id="end_time" name="end_time"
                                    value="{{ $class->end_time }}">
                            </div>
                            @error('end_time')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Available Students -->
                        <div class="mb-3">
                            <label for="avaliable_stu" class="form-label">Available Students</label>
                            <input type="number" class="form-control" id="avaliable_stu" name="avaliable_stu"
                                placeholder="Enter number of students" value="{{ $class->avaliable_stu }}">
                            @error('avaliable_stu')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Registered Students -->
                        <div class="mb-3">
                            <label for="registered_stu" class="form-label">Registered Students</label>
                            <input type="number" class="form-control" id="registered_stu" name="registered_stu"
                                placeholder="Enter number of students" value="{{ $class->registered_stu }}">
                            @error('registered_stu')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Date inputs -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ $class->start_date }}">
                            </div>
                            @error('start_date')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ $class->end_date }}">
                            </div>
                            @error('end_date')
                                <div class="text-danger text-fade">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update Schedule</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
