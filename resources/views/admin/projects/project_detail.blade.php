@extends('admin.head')
@section('content')
<style>
    .form-container {
      max-width: 600px;
      margin: 20px auto;
      padding: 40px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-title {
      font-weight: 600;
      margin-bottom: 30px;
    }
    .btn-space {
      gap: 10px;
    }
  </style>
<main>
    <div class="form-container">
        <h4 class="form-title text-center">Project Detail Form</h4>
        <form>
          <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" placeholder="Enter student name">
          </div>
          <div class="mb-3">
            <label for="projectName" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="projectName" placeholder="Enter project name">
          </div>
          <div class="mb-3">
            <label for="courseName" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="courseName" placeholder="Enter course name">
          </div>
          <div class="mb-3">
            <label for="batch" class="form-label">Batch</label>
            <input type="text" class="form-control" id="batch" placeholder="e.g. Batch 2025">
          </div>

          <div class="d-flex justify-content-between btn-space">
            <a href="javascript:history.back()" class="btn btn-outline-dark">Back</a>
            <button type="submit" class="btn btn-success">Accept</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

          </div>
        </form>
      </div>

</main>

@endsection
