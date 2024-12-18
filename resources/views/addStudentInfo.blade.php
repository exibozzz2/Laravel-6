@extends("layout")

@section("pageTitle")
    Add Student Info
@endsection

@section("content")
    <div class="container d-flex justify-content-center align-items-center">
        <form class="mb-3 mt-3 col-12 d-flex justify-content-center align-items-center flex-column bg-custom border-radius rounded" method="POST" action="/admin/add-student-info">

            {{ csrf_field() }}
            @if($errors->any())
                <p class="bg-danger">Error: {{ $errors->first() }}</p>
            @endif

            <h1>Insert student information </h1>
            <div class="form-group mb-1 col-5 ">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control col-lg-10" id="subject" aria-describedby="Enter subject name " placeholder="Enter subject name" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="grade">Grade</label>
                <input type="number" name="grade" class="form-control" id="grade" aria-describedby="Enter grade" placeholder="Enter grade" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="professor">Professor</label>
                <input type="text" name="professor" class="form-control" id="professor" aria-describedby="Enter professor name " placeholder="Enter professor name" required>
            </div>

            <button type="submit" class="btn btn-primary m-3">Add Student</button>
        </form>
    </div>


@endsection
