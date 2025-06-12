@extends("layout")

@section("pageTitle")
    Successfully Ordered!
@endsection

@section('content')

    <div class="thank-you-card text-center">
        <div class="emoji mb-3">🎉</div>
        <h1 class="mb-3">Thank You for Your Order!</h1>
        <p class="lead mb-4">
            We’ve received your order and we’re already preparing it with care. <br>
            Your goodies are on the way and should arrive soon!
        </p>
        <hr>
        <p class="mb-4">
            An order confirmation has been sent to your email. <br>
            If you have any questions, we’re just a click away.
        </p>
        <a href="{{route('product.all')}}" class="btn btn-home px-4 py-2">Back to Products</a>
    </div>

@endsection
