@extends("layout")

@section("pageTitle")
    Add Contact
@endsection

@section("content")
    <div class="container d-flex justify-content-center align-items-center">
        <form class="mb-3 mt-3 col-12 d-flex justify-content-center align-items-center flex-column bg-custom border-radius rounded" method="POST" action="/admin/add-contact">

            {{ csrf_field() }}
            @if($errors->any())
                <p class="bg-danger">Error: {{ $errors->first() }}</p>
            @endif

            <h1>Insert Contact </h1>
            <div class="form-group mb-1 col-5 ">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control col-lg-10" id="name" aria-describedby="Enter contact name " placeholder="Enter contact name" value="{{old("name")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" aria-describedby="Enter contact subject" placeholder="Enter contact subject" value="{{old("subject")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="message">Message</label>
                <input type="text" name="message" class="form-control" id="message" aria-describedby="Enter contact message " placeholder="Enter contact message" value="{{old("message")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="Enter contact email " placeholder="Enter contact email" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="phone">Phone</label>
                <input type="number" name="phone" class="form-control" id="phone" aria-describedby="Enter contact phone " placeholder="Enter contact phone" required>
            </div>

            <button type="submit" class="btn btn-primary m-3">Add Contact</button>
        </form>
    </div>


@endsection
