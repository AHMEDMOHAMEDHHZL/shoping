<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>admin panal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('adminassets/img/favicon.ico;') }}" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('adminassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('adminassets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('adminassets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ Auth::user()->image }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->status }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/layout" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/allusers" class="dropdown-item" target="_blank">all users</a>
                            <a href="/addusers" class="dropdown-item" target="_blank">add user</a>

                        </div>
                    </div>
                    <a href="/Message" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Message</a>
                    <a href="setings" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>setings</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-table me-2"></i>product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/allproduct" class="dropdown-item">all product</a>

                            <a href="/addproduct" class="dropdown-item">add product</a>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-chart-bar me-2"></i>catogory</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/allcatogory" class="dropdown-item">allcatogory</a>
                            <a href="/addcatogory" class="dropdown-item">addcatogory</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>offers</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/alloffer" class="dropdown-item">alloffers</a>

                            <a href="/addoffer" class="dropdown-item">addoffer</a>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="far fa-file-alt me-2"></i>section offer</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="/alloffer" class="dropdown-item">all section offers</a>
    
                                <a href="/addoffer" class="dropdown-item">add section offer</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="far fa-file-alt me-2"></i>orders</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="/allorders" class="dropdown-item">all orders</a>
    
                            </div>
                        </div>
                    </div>
                </div>
                
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">

                        <div
                            class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ Auth::user()->image }}" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="/Profile" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->





                    <main>
                        @yield('content')
                    </main>

                    <!-- Footer Start -->
                    <div class="container-fluid pt-4 px-4">
                        <div class="bg-secondary rounded-top p-4">
                            <div class="row">
                                <div class="col-12 col-sm-6 text-center text-sm-start">
                                    &copy; <a href="#">shoping</a>, All Right Reserved.
                                </div>
                                <div class="col-12 col-sm-6 text-center text-sm-end">
                                    Designed By <a>ahmed mohamed</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer End -->
                </div>
                <!-- Content End -->


                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                        class="bi bi-arrow-up"></i></a>
            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script src="{{ asset('adminassets/lib/chart/chart.min.js') }}"></script>
            <script src="{{ asset('adminassets/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('adminassets/lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('adminassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('adminassets/lib/tempusdominus/js/moment.min.js') }}"></script>
            <script src="{{ asset('adminassets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
            <script src="{{ asset('adminassets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('adminassets/js/main.js') }}"></script>
            <script>
                $(document).ready(function () {
    $(".clickable").click(function () {
        var target = $(this).data("target");
        $(target).toggleClass("open");
    });
});

            </script>
</body>

</html>
