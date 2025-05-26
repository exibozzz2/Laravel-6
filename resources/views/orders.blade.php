@extends("layout")

@section("pageTitle")
       Orders
@endsection



@section("content")


    <h1 class="text-center">All Orders</h1>
    @foreach($orders as $order)



        <div class="col-12 d-flex align-items-center justify-content-center">

            <div class="d-flex flex-column bg-white rounded p-3 col-3 m-1">
                <p class="bg-danger rounded p-1"><b>Name</b>: {{$order['productName']}}</p>
                <p><b>Product ID</b>: {{$order['productId']}}</p>
                <p><b>Price</b>: {{$order['productPrice']}}</p>
                <p><b>Amount</b>: {{$order['productAmount']}}</p>

            </div>


        </div>





    @endforeach

@endsection
