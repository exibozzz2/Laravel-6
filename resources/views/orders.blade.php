@extends("layout")

@section("pageTitle")
       Orders
@endsection



@section("content")



    @foreach($orders as $order)
        <p>{{$order['productName']}}</p>
        <p>{{$order['productId']}}</p>
        <p>{{$order['productAmount']}}</p>

    @endforeach

@endsection
