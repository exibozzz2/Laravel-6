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
            <th scope="col">Amount</th>
            <th scope="col">DateInsert</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
            @foreach($allProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->date_created }}</td>

                    <td>
                        <a href="{{route('delete.product', ['product' => $product->id]) }}"  class="btn btn-danger">Delete</a>
                        <a href="{{ route('edit.product', ['product' => $product->id]) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
