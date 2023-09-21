
@extends('layouts.layout')

@section('content')
    <!-- Your Home Page Content Goes Here -->
    
<!-- single product -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="/{{ $singleproduct->imagepath }}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3 >{{ $singleproduct->name }}</h3>
                    <p class="single-product-pricing"><span>{{ $singleproduct->price }}EGP</span></p>
                    <p>{{ $singleproduct->description }}</p>
                    <div class="single-product-form">
                        <form action="/cart">
                            <input type="number" value="{{ $singleproduct->quantity }}" readonly lang="en">
                        </form>
                        <br> <br>
					
                        <p><strong>Category: </strong>{{ $categoryName }}</p>
                        <form action="/add-to-cart2" method="POST">
                            @csrf <!-- يُستخدم لحماية الطلب من هجمات CSRF -->
                        
                            <input type="hidden" name="singleproduct_name" value="{{ $singleproduct->name }}">
                            <input type="hidden" name="singleproduct_price" value="{{ $singleproduct->price }}">
                            <input type="hidden" name="singleproduct_image" value="{{ $singleproduct->imagepath }}">
                        
                            <button type="submit" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->

<!-- عرض 3 منتجات أخرى من نفس القسم -->
<div class="other-products" style="text-align: center;">
	<h3 style="text-align: center;">منتجات أخرى من نفس القسم</h3>
    <div class="row" style="text-align: center;">
        @foreach($otherProducts as $product2)
            <div class="col-md-4" style="text-align: center;">
                <div class="single-product-item" style="text-align: center;">
                    <div class="single-product-img" style="text-align: center;">
                        <img src="/{{$product2->imagepath }}" alt="">
                    </div>
                    <div class="single-product-content">
                        <h4>{{ $product2->name }}</h4>
                        <p class="single-product-price">{{ $product2->price }} EGP</p>
                        <a href="/single-product/{{ $product2->id }}" class="boxed-btn">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection


