@extends("layout")

@section("pageTitle")
    Add Product
@endsection

@section("content")
    <div class="container d-flex justify-content-center align-items-center">
        <form class="mb-3 mt-3 col-12 d-flex justify-content-center align-items-center flex-column bg-custom border-radius rounded" method="POST" action="/admin/add-product">

            {{ csrf_field() }}
            @if($errors->any())
                <p class="bg-danger">Error: {{ $errors->first() }}</p>
            @endif

            <h1>Insert Product </h1>
            <div class="form-group mb-1 col-5 ">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control col-lg-10" id="name" aria-describedby="Enter product name " placeholder="Enter product name" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" aria-describedby="Enter product description" placeholder="Enter product description" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby="Enter product price " placeholder="Enter product price" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="form-control" id="amount" aria-describedby="Enter product amount " placeholder="Enter product amount" required>
            </div>

            <button type="submit" class="btn btn-primary m-3">Add Product</button>
        </form>
    </div>


@endsection