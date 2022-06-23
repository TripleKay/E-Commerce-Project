<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontEnd/node_modules/@fortawesome/fontawesome-free/css/all.min.css')}}" >
    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('frontEnd/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('frontEnd/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css')}}"    >
    <link rel="stylesheet" href="{{ asset('frontEnd/scss/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEnd/resources/css/style.css')}}">
    <title>E-Market</title>
</head>
<body>
     <!-- -------------------------------PreLoader------------------------------------  -->
     <!-- <div class="d-flex justify-content-center align-items-center bg-primary vw-100 vh-100 position-fixed loader-container">
        <div class="loader">Loading...</div>
    </div> -->
    <!-- -------------------------------header-------------------------------------  -->
    <header class="">
        <!-- -------------------------------header1-------------------------------------  -->
        <div class="header-1 d-none d-sm-block bg-primary py-3"  style="border-bottom: 1px solid #ffffff50 ;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between text-white ">
                            <div class="d-flex">
                                <div class="d-flex me-3 align-items-center">
                                    <i class="fa-solid fa-envelope"></i>
                                    <p class="mb-0 ms-2">example@gmail.com</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-phone"></i>
                                    <p class="mb-0 ms-2">+95 9912 3456 789</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <i class="fa-brands fa-facebook ms-3"></i>
                                <i class="fa-brands fa-youtube ms-3"></i>
                                <i class="fa-brands fa-instagram ms-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------header2-------------------------------------  -->
        <div class="header-2 py-3 bg-primary" style="border-bottom: 1px solid #ffffff50 ;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between flex-wrap header-2-container">
                            <!-- mobile menu btn  -->
                            <button class="btn d-block d-sm-block d-md-none text-white mobile-menu"><i class="fa-solid fa-bars" style="font-size: 25px ;"></i></button>
                            <!-- mobile menu btn  -->

                            <h3 class="mb-0 text-white logo">E-Market</h3>
                            <form action="" class="">
                                <div class="d-none d-sm-none d-md-flex bg-white rounded-pill p-1 header-search-bar">
                                    <input type="text" class="form-control border-0" placeholder="search product....">
                                    <button class="btn btn-primary text-white">Search</button>
                                </div>
                            </form>
                            <div class="d-flex">
                                <a href="" class="text-white ms-3">
                                    <i class="icon fa-solid fa-user"></i>
                                </a>
                                <a href="" class="text-white ms-3">
                                    <i class="icon fa-solid fa-heart"></i>
                                </a>
                                <a href="" class="text-white ms-3 position-relative">
                                    <i class="icon fa-solid fa-cart-shopping"></i>
                                    <span class="badge bg-dark position-absolute rounded-circle cart-badge">4</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------header3-------------------------------------  -->
        <div class="header-3-container">
            <div class="header-3 bg-primary d-none d-sm-none d-md-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="py-0">
                                <!-- mobile close btn  -->
                                <button class="btn btn-light shadow-lg d-block d-md-none mobile-close"><i class="fa-solid fa-xmark" style="font-size: 25px ;"></i></button>
                                <!-- mobile close btn  -->
                                    <ul class="nav d-flex align-items-center nav-bar">
                                        <!-- for mobile  -->
                                        <li class="mobile-search-bar d-md-none">
                                            <form action="" class="py-3 px-2">
                                                <div class="d-flex p-1 rounded bg-primary" style="border: 1px solid #fff; ">
                                                    <button class="btn rounded-circle m-0 text-white"><i class="fas fa-search"></i></button>
                                                    <input type="text" class="form-control text-white bg-transparent border-0 ms-0" placeholder="search .....">
                                                </div>
                                            </form>
                                        </li>
                                        <li class="nav-item cat-nav-item">
                                            <!-- all category btn  -->
                                            <div class="dropdown me-3 cat-dropdown shadow">
                                                <button class="btn btn-info text-white dropdown-toggle py-3" style="border-radius: 0px;" type="button" id="category-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-list me-3 d-none d-sm-none d-md-inline-block"></i> ALL CATEGORIES
                                                </button>
                                                <!-- all category container  -->
                                                <ul class="dropdown-menu shadow-lg" aria-labelledby="category-btn" style="width: 100%; border-radius: 0px 0px 10px 10px">
                                                    <!-- -------------main cat item-----------------  -->
                                                    @foreach ($categories as $cat)
                                                        <li class="cat-item">
                                                            <div class="d-flex align-items-center justify-content-between dropdown-item py-2 my-1">
                                                                <a class="" >{{ $cat->name }}</a>
                                                                <i class="fa-solid fa-angle-right d-none d-md-inline-block"></i>
                                                            </div>
                                                            <!-- sub cat container  -->
                                                            @php
                                                                $subcategories = App\Models\SubCategory::where('category_id',$cat->category_id)->get();
                                                            @endphp
                                                            @if (!$subcategories->count() == 0)
                                                                <div class="card subcat-container " >
                                                                    <div class="card-body">
                                                                    <!-- sub cat item  -->
                                                                    <div class="row">
                                                                        @foreach ($subcategories as $subcat)
                                                                        <div class="col-6">
                                                                                <a href="" class="dropdown-item"><h6>{{$subcat->name}}</h6></a>
                                                                                <div class="d-flex flex-column px-3 mb-3">
                                                                                    @php
                                                                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcat->subcategory_id)->get();
                                                                                    @endphp
                                                                                    @foreach ($subsubcategories as $subsubcat)
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="bg-black rounded-circle" style="width:5px ; height: 5px;"></div>
                                                                                            <a href="" class="btn text-start dropdown-item">{{ $subsubcat->name}}</a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                     <!-- -------------main cat item-----------------  -->
                                                </ul>
                                            </div>
                                        </li>
                                         <!-- nav menu -->
                                        <li class="nav-item">
                                          <a class="nav-link text-white" href="#">HOME</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link text-white" href="#">BLOG</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="#">ABOUT US</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="#">CONTACT US</a>
                                        </li>
                                        <li class="nav-item">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="btn btn-light">logout</button>
                                            </form>
                                        </li>
                                      </ul>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')
    <!-- -------------------------------footer-------------------------------------  -->
    <footer class="bg-white" id="footer-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-4">
                    <div class="footer-box">
                        <!-- <h5 class="mb-4">ABOUT US</h5> -->
                        <h3 class="mb-4 text-primary">E-Market</h3>
                        <p class="text-black-50 me-2 mb-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates numquam ad consequunturesse.</p>
                        <div class="d-flex">
                            <div class="me-3 d-flex align-items-center justify-content-center bg-dark rounded-circle " style="width: 40px ; height: 40px; ">
                                <i class="fa-brands fa-facebook text-white"></i>
                            </div>
                            <div class="me-3 d-flex align-items-center justify-content-center bg-dark rounded-circle " style="width: 40px ; height: 40px; ">
                                <i class="fa-brands fa-youtube text-white"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-center bg-dark rounded-circle " style="width: 40px ; height: 40px; ">
                                <i class="fa-brands fa-instagram text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="footer-box">
                        <h5 class="mb-4">CUSTOMER SERVICE</h5>
                        <div class="">
                            <a href="" class="btn d-block text-start">My Account</a>
                            <a href="" class="btn d-block text-start">Order History</a>
                            <a href="" class="btn d-block text-start">FAQ</a>
                            <a href="" class="btn d-block text-start">Help Center</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="footer-box">
                        <h5 class="mb-4">CONTACT US</h5>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-map-location-dot bg-dark text-white" style="font-size: 20px; padding: 10px;"></i>
                            <p class="mb-0 ms-3">Yangon,Myanmar</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-phone bg-dark text-white" style="font-size: 20px; padding: 10px;"></i>
                            <div class="">
                                <p class="mb-0 ms-3">+95 9123 4567 89</p>
                                <p class="mb-0 ms-3">+95 9123 4567 89</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-envelope bg-dark text-white" style="font-size: 20px; padding: 10px;"></i>
                            <p class="mb-0 ms-3">example@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-12 ">
                            <p class="text-white-50 mb-0 py-3 text-center">www.e-market.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('frontEnd/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('frontEnd/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontEnd/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontEnd/node_modules/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('frontEnd/resources/js/script.js')}}"></script>
</body>
</html>
