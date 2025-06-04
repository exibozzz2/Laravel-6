@extends("layout")

@section("pageTitle")
       Orders
@endsection


@section("content")

    <h1 class="text-center">All Orders</h1>

    @foreach($allOrders as $order)


        <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="d-flex flex-column bg-white rounded p-3 col-3 m-1">
            <p class="bg-danger rounded p-1"><b>Name</b>: {{$order['productName']}}</p>
            <p><b>Product ID</b>: {{$order['productId']}}</p>
            <p><b>Unit Price</b>: {{$order['productPrice']}}</p>
            <p><b>In Stock</b>: {{$order['productStock']}}</p>
            <p><b>Ordered</b>: {{$order['productAmount']}}pcs</p>
            <p><b>Total Price</b>: {{$order['productTotal']}}</p>
        </div>
        </div>
    @endforeach
@endsection
