@extends("layout")

@section("pageTitle")
       Orders
@endsection



@section("content")



    <h1 class="text-center">All Orders</h1>

    @foreach($allOrders as $order)
        @foreach($ordersFromSession as $singleOrderedProduct)

         @if($singleOrderedProduct['productId'] == $order->id)

        <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="d-flex flex-column bg-white rounded p-3 col-3 m-1">
                    <p class="bg-danger rounded p-1"><b>Name</b>: {{$order->name}}</p>
                    <p><b>Product ID</b>: {{$order->id}}</p>
                    <p><b>Unit Price</b>: {{$order->price}}</p>
                    <p><b>In Stock</b>: {{$order->amount}}</p>
                    <p><b>Ordered</b>: {{$singleOrderedProduct['productAmount']}}pcs</p>
                    <p><b>Total Price</b>: {{$order->price*$singleOrderedProduct['productAmount']}}</p>
                </div>
        </div>

         @endif
        @endforeach
    @endforeach

@endsection
