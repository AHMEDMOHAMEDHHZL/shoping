@extends('layouts.layout')

@section('content')
    <!-- Your Home Page Content Goes Here -->
<!-- products -->

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row product-lists">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/single-product/{{ $product->id }}"><img src="{{ $product->imagepath }}" alt=""></a>
                        </div>
                        <h3>{{ $product->name }}</h3>
                        <p class="product-price">{{ $product->price }}EGP</p>
                        <p><strong>Category: </strong>{{ $categoryName }}</p>
                        <form action="/add-to-cart" method="POST">
                            @csrf <!-- يُستخدم لحماية الطلب من هجمات CSRF -->
                        
                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                            <input type="hidden" name="product_price" value="{{ $product->price }}">
                            <input type="hidden" name="product_image" value="{{ $product->imagepath }}">
                        
                            <button type="submit" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>                                                                                                
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end products -->


@endsection


