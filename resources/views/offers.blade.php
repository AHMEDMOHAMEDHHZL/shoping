

@extends('layouts.layout')

@section('content')
    <!-- Your Home Page Content Goes Here -->
    	<!-- latest news -->
		@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
				@foreach ($offers2 as $item )
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<img
							src="{{ url($item->image) }}" alt=" العرض">
				            </div> <br><br>						
							<h3>{{ $item->name }}</h3>
							<p class="product-price">{{ $item->prise }}EGP</p>
							<p class="excerpt">{{ $item->description }}</p>
							<form action="/add-to-cart3" method="POST">
								@csrf <!-- يُستخدم لحماية الطلب من هجمات CSRF -->
							
								<input type="hidden" name="product_name" value="{{ $item->name }}">
	                            <input type="hidden" name="product_price" value="{{ $item->prise }}">
								<input type="hidden" name="product_image" value="{{ $item->image }}">
							
								<button type="submit" class="cart-btn">
									<i class="fas fa-shopping-cart"></i> Add to Cart
								</button>
							</form>          
						</div>
						@endforeach
				                               
					</div>

				</div>

			</div>

	

	<!-- end latest news -->
@endsection
