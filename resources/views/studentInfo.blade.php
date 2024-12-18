@extends("layout")

@section("pageTitle")
    Student Info
@endsection

@section("content")

    <div class="container d-flex align-items-center justify-content-center flex-column ">
        @foreach($allStudentsInfo as $studentInfo)
            <div class="col-8 bg-custom text-dark mt-2 h-auto p-1 m-1 border border-2 border-dark ">
                <h1>Subject: {{ $studentInfo->subject }}</h1>
                <hr>
                <p><b>Grade:</b> {{ $studentInfo->grade }}</p>
                <p><b>Professor:</b> {{ $studentInfo->professor }}</p>
                <p><b>Time:</b> {{ $studentInfo->created_at }}</p>
            </div>
        @endforeach
    </div>

@endsection

