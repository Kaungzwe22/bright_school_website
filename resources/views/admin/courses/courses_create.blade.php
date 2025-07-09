@extends('admin.head')
@section('content')

<main>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <a href="{{route('admin_course_view')}}" class="btn btn-secondary">
                    <i class="bx bx-left-arrow-alt"></i> Back
                </a>
                <div class="card my-3 border-warning shadow">
                    {{-- Card Header  --}}
                    <div class="card-header border-warning">
                        <h3 class="h5 text-primary">
                            <i class="bx bx-book fs-3"></i> Course
                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- Insert image  --}}
                        <form action="{{ route('admin_course_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label h6 my-2">Name</label>
                                <input required type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{ old('course_name') }}" id="name" placeholder="Course Name">
                                @error('course_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description  --}}
                            <div class="mb-3 form-group">
                                <label for="description" class="form-label h6 my-2">Description</label>
                                <textarea name="des" rows="2" style="resize: none;" class="form-control @error('description') is-invalid @enderror" placeholder="Course description / One sentence is enough">{{ old('des') }}</textarea>
                                @error('des')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Duration  --}}
                            <div class="mb-3 form-group">
                                <label for="duration" class="form-label h6 my-2">Duration</label>
                                <input required type="text" name="duration" value="{{ old('duration') }}" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="Eg. 4 months">
                                @error('duration')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- hours  --}}
                            <div class="mb-3 form-group">
                                <label for="hours" class="form-label h6 my-2">Hours</label>
                                <input required type="number" name="hours" value="{{ old('hours') }}" class="form-control @error('hours') is-invalid @enderror" id="hours" placeholder="Instructor hours">
                                @error('hours')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Normal Price  --}}
                            <div class="mb-3 form-group">
                                <label for="normal_price" class="form-label h6 my-2">Normal Price</label>
                                <input required type="number" name="normal_price" value="{{ old('normal_price') }}" class="form-control @error('normal_price') is-invalid @enderror" id="normal_price" placeholder="Normal Price">
                                @error('normal_price')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Special Price  --}}
                            <div class="mb-3 form-group">
                                <label for="special_price" class="form-label h6 my-2">Special Price</label>
                                <input type="number" name="special_price" value="{{ old('special_price') }}" class="form-control @error('special_price') is-invalid @enderror" id="special_price" placeholder="Special Price">
                                @error('special_price')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Course Type --}}
                            <div class="mb-3 form-group">
                                <label for="type" class="form-label h6 my-2">Course Type</label>
                                <select name="course_type" class="form-control @error('type') is-invalid @enderror" id="type">
                                    <option value="" selected disabled>Select Course Type</option>
                                    @foreach($course_types as $courseType)
                                        <option value="{{ $courseType->id }}" {{ old('type') == $courseType->id ? 'selected' : '' }}>
                                            {{ $courseType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Image  --}}
                            <div class="mb-3 form-group">
                                <label for="image" class="form-label h6 my-2">Image</label>
                                <input required type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- About  --}}
                            <div class="mb-3 form-group">
                                <label for="about" class="form-label h6 my-2">About</label>
                                <textarea name="about" rows="7" style="resize: none;" class="form-control @error('about') is-invalid @enderror" id="summernote2" placeholder="About">{{ old('about') }}</textarea>
                                @error('about')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Included  --}}
                            <div class="mb-3 form-group">
                                <label for="included" class="form-label h6 my-2">Included Outline</label>
                                <textarea name="included" rows="7" style="resize: none;" class="form-control @error('included') is-invalid @enderror" id="summernote3" placeholder="included">{{ old('included') }}</textarea>
                                @error('included')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Link  --}}
                            <div class="mb-3 form-group">
                                <label for="links" class="form-label h6 my-2">Link</label>
                                <textarea name="links" rows="3" style="resize: none;" class="form-control @error('links') is-invalid @enderror" id="links" placeholder="Link">{{ old('links') }}</textarea>
                                @error('links')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button style="background-color: #ff6c0f; color:white;" class="btn mt-3">
                                <i class="bx bx-down-arrow-alt"></i> Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
     $(document).ready(function() {
        $('#summernote2').summernote({
            height: 200
        });
        $('#summernote3').summernote({
            height: 200
        });
    });
</script>

@endsection
