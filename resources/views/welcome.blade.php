
@extends('layouts.layout')

@section('content')
    <!-- Your Home Page Content Goes Here -->
     <!--start offers-->
     <div class="latest-news mt-150 mb-150" id="offer">
        <div class="container">
            <h3 style="text-align: center;font-size:30px "><span class="orange-text"
                    style="text-align: center; font-size:30px ">عروض </span>الموقع </h3>
            <p style="text-align: center; font-size:30px ">متعة التسوق عبر موقعنا المميز</p>
            <div class="row">

                @foreach ($offer as $item2)
                <br><br>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <div class="latest-news-bg news-bg-6">
                            <!-- تعديل الرابط هنا ليرتبط بصفحة المنتجات المخصصة للقسم -->
                            <a href="/offers?offer_id={{ $item2->id }}"><img src="{{ url($item2->image) }}"
                                    alt="اقسام العروض"></a>
                        </div> <br><br>
                        <div class="news-text-box">
                            <h3> {{ $item2->name }}</h3>
                            <p class="excerpt">{{ $item2->description }}</p>
                            <a href="/offers?offer_id={{ $item2->id }}" class="read-more-btn">read more <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>
    <!--end offers-->

    <!-- product catogory -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اقسام </span>الموقع </h3>
                        <p>متعة التسوق عبر موقعنا المميز</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <!-- تعديل الرابط هنا ليرتبط بصفحة المنتجات المخصصة للقسم -->
                                <a href="/product?category_id={{ $category->id }}"><img
                                        src="{{ url($category->imagepath) }}" alt=""></a>
                            </div>
                            <div>
                                <h4>{{ $category->description }}</h4><br><br>
                            </div>
                            <h3>{{ $category->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product catogory -->
@endsection
