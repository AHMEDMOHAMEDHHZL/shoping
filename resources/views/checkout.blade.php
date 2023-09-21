
@extends('layouts.layout')

@section('content')
    <!-- Your Home Page Content Goes Here -->
        <!-- check out section -->

        <section class="checkout-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="order-details-wrap">
                            <form action="/add-order" method="POST">
                                @csrf                         
                                <table class="order-details">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-details-body">
                                    @foreach ($cart as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }} EGP</td>
                                        <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                                        <input type="hidden" name="product_name[]" value="{{ $item->name }}">
                                        <input type="hidden" name="product_price[]" value="{{ $item->price }}">
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-summary">
                            <h2>Order Summary</h2>
                            <table class="summary-table">
                                <tbody>
                                    <tr>
                                        
                                        <td >Subtotal</td>
                                        <td>{{ $totalPrice }} EGP</td>
                                        
                                    </tr>
                                    <tr class="total-row">
                                        <td>Total</td>
                                        <td>{{ $totalPrice }} EGP</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-form">
           
                    <h1 class="heading">Complete Your Order</h1>
                    <div class="input-box">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <label for="number">Your Number</label>
                        <input type="number" id="number" name="number" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <label for="method">Payment Method</label>
                        <select id="method" name="method">
                            <option value="cash on delivery" selected>Cash on Delivery</option>
                            <option value="credit cart">Credit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="flat">Address Line 1</label>
                        <input type="text" id="flat" name="flat" placeholder="e.g. flat no." required>
                    </div>
                    <div class="input-box">
                        <label for="street">Address Line 2</label>
                        <input type="text" id="street" name="street" placeholder="e.g. street name" required>
                    </div>
                    <div class="input-box">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="e.g. mumbai" required>
                    </div>
                    <div class="input-box">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" placeholder="e.g. maharashtra" required>
                    </div>
                    <div class="input-box">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" placeholder="e.g. india" required>
                    </div>
                    <div class="input-box">
                        <label for="pin_code">Pin Code</label>
                        <input type="text" id="pin_code" name="pin_code" placeholder="e.g. 123456" required>
                    </div>
                    <br> 
                    <button type="submit" class="btn btn-outline-success">
                        
                        Place Order..
                    </button>
                </form>
            </div>
        </section>
        <!-- end check out section -->
        
@endsection
