@extends("layout")

@section("pageTitle")
    All Products
@endsection

@section("content")


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">In Stock</th>
            <th scope="col">Order product</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>

            @foreach($allProducts as $product)


                <tr>
                    <td>{{ $product->id }}</td>
                    <td class="col-2">{{ $product->name }}</td>
                    <td class="col-3">{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>
                        <form method="POST" action="{{route('orders.create')}}">
                            {{ csrf_field() }}

                            <input type="hidden" name="productName" value="{{$product->name}}">
                            <input type="hidden" name="productId" value="{{$product->id}}">
                            <input type="hidden" name="productPrice" value="{{$product->price}}">
                            <input class="col-7" type="number" name="productAmount" placeholder="Enter the order quantity:" required>
                            <button class="btn btn-success ">Order</button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('product.delete', ['product' => $product->id]) }}"  class="btn btn-danger">Delete</a>
                        <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
