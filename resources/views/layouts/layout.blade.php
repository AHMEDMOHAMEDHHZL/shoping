<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>shoping</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">

    <style>
        .container {
            direction: rtl;
        }

        <style>.container {
            direction: rtl;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .checkout-form {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .checkout-form h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .inputBox {
            flex-basis: calc(50% - 20px);
            margin-bottom: 20px;
        }

        .inputBox span {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            background: url('down-arrow.png') no-repeat right center / auto 100%;
        }

        .grand-total {
            display: block;
            font-weight: bold;
            margin-top: 20px;
        }

        .order-message-container {
            text-align: center;
            margin-top: 40px;
        }

        .message-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .order-detail {
            margin-top: 20px;
        }

        .customer-details {
            margin-top: 20px;
            font-size: 14px;
        }

        .customer-details p {
            margin-bottom: 6px;
        }

        .order-message-container .btn {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .order_btn {
            text-decoration: none;
            background-color: #FFD700;
            color: #333;
            padding: 10px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;


        }

        .grand-total {
            text-align: center;
            font-size: 30px;
        }

        .order-summary {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }

        .order-summary h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .summary-table {
            width: 100%;
        }

        .summary-table td {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }

        .summary-table .subtotal-amount,
        .summary-table .total-amount {
            font-weight: bold;
            color: #e67e22;
        }

        .summary-table .total-row {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->
                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="/welcome">الرئيسيه</a>
                                </li>
                                <li><a href="/about">من نحن </a></li>
                                <li><a href="#">الصفحات</a>
                                    <ul class="sub-menu">

                                        <li><a href="/cart">السلة</a></li>
                                        <li><a href="/checkout">Check Out</a></li>
                                        <li><a href="/contact">تواصل معنا</a></li>
                                        <li><a href="/offers">العروض</a></li>
                                        <li><a href="/product">المنتجات</a></li>
                                    </ul>
                                </li>
                                <li><a href="/offers">العروض</a>
                                </li>
                                <li><a href="/contact">تواصل معنا</a></li>
                                <li><a href="/product">المنتجات</a>
                                    <ul class="sub-menu">

                                        <li><a href="/checkout">Check Out</a></li>
                                        <li><a href="/single-product">Single Product</a></li>
                                        <li><a href="/cart">السلة</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Fresh & Organic</p>
                            <h1>Delicious Seasonal Fruits</h1>
                            <div class="hero-btns">
                                <a href="/product" class="boxed-btn">Fruit Collection</a>
                                <a href="/login" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->
    <main>
        @yield('content')
    </main>

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="/index">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/services">Shop</a></li>
                            <li><a href="/news">News</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="/welcome">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2023 - <a href="https://imransdesign.com/">ahmedmohamed</a>, All Rights
                        Reserved.<br>

                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'نجاح',
                text: '{{ session('success') }}',
                confirmButtonText: 'إغلاق'
            });
        @endif
    </script>
    <!-- jquery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>

</html>
