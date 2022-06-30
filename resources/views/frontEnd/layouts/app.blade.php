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
                            <a href="{{ route('frontend#index') }}" class="btn p-0">
                                <h3 class="mb-0 text-white logo">E-Market</h3>
                            </a>

                            <form action="" class="">
                                <div class="d-none d-sm-none d-md-flex bg-white rounded-pill p-1 header-search-bar">
                                    <input type="text" class="form-control border-0" placeholder="search product....">
                                    <button class="btn btn-primary text-white">Search</button>
                                </div>
                            </form>
                            <div class="">
                                <a href="{{ route('frontend#viewCarts') }}" class="btn btn-outline-light position-relative  p-0 d-flex justify-content-between align-items-center">
                                    <i class="fa-solid fa-cart-shopping py-2 px-2" style="border-right: 1px solid #fff"></i>
                                    <div class="headerCartBox">
                                        <span class="badge bg-dark rounded-circle mb-0 position-absolute cart-badge">
                                            @if (Session::has('cart'))
                                                {{ count(Session::get('cart')) }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                        @if (Session::has('cart'))
                                            @php $total = 0 @endphp
                                            @foreach (Session::get('cart') as $item)
                                                     @php
                                                        $total += $item['price'] * $item['quantity']
                                                     @endphp
                                            @endforeach
                                            <p class="mb-0 py-2 px-2">CART - {{ $total}} Ks</p>
                                        @else
                                            <p class="mb-0 py-2 px-2">CART - 0 Ks</p>
                                        @endif
                                    </div>
                                </a>
                                {{-- <div class="cart-overlay card shadow-lg border-0 bg-primary position-absolute" style="top: 100%; bottom: 0; right: 0; width: 300px; z-index: 2000;">
                                    <div class="card-body p-1">
                                        <div class="card cart-item mb-1">
                                            <div class="card-body p-1 d-flex justify-content-between align-items-center">
                                                <img src="{{ asset('frontEnd/resources/image/product1.jpg') }}" alt="" srcset="" style="width: 80px; height: 80px">
                                                <div class="">
                                                    <p class="mb-0">Apple Watch</p>
                                                    <span>8 items</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cart-item mb-1">
                                            <div class="card-body p-1 d-flex justify-content-between align-items-center">
                                                <img src="{{ asset('frontEnd/resources/image/product1.jpg') }}" alt="" srcset="" style="width: 80px; height: 80px">
                                                <div class="">
                                                    <p class="mb-0">Apple Watch</p>
                                                    <span>8 items</span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="btn btn-primary text-white w-100">View All</a>
                                    </div>
                                </div> --}}
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
                                <div class="d-flex justify-content-between align-items-center">
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
                                                    @php
                                                    $categories = App\Models\Category::get();
                                                    @endphp
                                                    @foreach ($categories as $cat)
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id',$cat->category_id)->get();
                                                        @endphp
                                                        <li class="cat-item">
                                                            <div class="d-flex align-items-center justify-content-between dropdown-item py-2 my-1">
                                                                <a href="{{ route('frontend#catProduct',$cat->category_id) }}" class="" >{{ $cat->name }}</a>
                                                                <i class="fa-solid fa-angle-right d-none {{ $subcategories->count() == 0 ? 'd-md-none' : 'd-md-inline-block' }}"></i>
                                                            </div>
                                                            <!-- sub cat container  -->
                                                            @if (!$subcategories->count() == 0)
                                                                <div class="card subcat-container " >
                                                                    <div class="card-body">
                                                                    <!-- sub cat item  -->
                                                                    <div class="row">
                                                                        @foreach ($subcategories as $subcat)
                                                                        <div class="col-6">
                                                                                <a href="{{ route('frontend#subcatProduct',$subcat->subcategory_id) }}" class="dropdown-item"><h6>{{$subcat->name}}</h6></a>
                                                                                <div class="d-flex flex-column px-3 mb-3">
                                                                                    @php
                                                                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcat->subcategory_id)->get();
                                                                                    @endphp
                                                                                    @foreach ($subsubcategories as $subsubcat)
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="bg-black rounded-circle" style="width:5px ; height: 5px;"></div>
                                                                                            <a href="{{ route('frontend#subsubcatProduct',$subsubcat->subsubcategory_id) }}" class="btn text-start dropdown-item">{{ $subsubcat->name}}</a>
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
                                          <a class="nav-link text-white" href="{{ route('frontend#index') }}">HOME</a>
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
                                      </ul>
                                      <div class="d-flex">
                                        <div class="me-2">
                                            <a href="{{ route('user#wishlist') }}" class="btn btn-outline-light" title="My Wishlist"><i class="fas fa-heart"></i></a>
                                        </div>
                                        <div class="myAccount me-2 position-relative">
                                            <a href="" class=" btn btn-outline-light"><i class="fas fa-user-alt"></i></a>
                                            @if (auth()->check())
                                                <div class="myAccountOverlay card border-0 bg-primary position-absolute">
                                                    <div class=" card-body p-1  d-flex flex-column">
                                                        <a href="" class="btn btn-primary text-white  text-start">My Account</a>
                                                        <a href="" class="btn  btn-primary text-white text-start">My Orders</a>
                                                        <hr class="my-1">
                                                        <form action="{{ route('logout') }}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary text-white w-100 text-start">logout</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="myAccountOverlay card border-0 bg-primary position-absolute">
                                                    <div class=" card-body p-1  d-flex flex-column">
                                                        <a href="{{ route('login') }}" class="btn btn-primary text-white  text-start">Login</a>
                                                        <a href="{{ route('register') }}" class="btn  btn-primary text-white text-start">Register</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                      </div>

                                </div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontEnd/resources/js/script.js')}}"></script>
    @yield('script')
    <script>
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
        function addToCart(id,amount){

            let productId = id;
            let colorId = '';
            let sizeId = '';
            let colorName = '';
            let sizeName = '';
            let qty = $('.quantity').val();
            let price = amount;

            //validation
            if($('.colorOption').length && $('.sizeOption').length){
                colorId = $('.colorOption').val();
                colorName = $('.colorOption').find("option:selected").text();

                sizeId = $('.sizeOption').val();
                sizeName = $('.sizeOption').find("option:selected").text();

                //each empty state
                if(colorId == '' || sizeId == ''){
                    $('.colorErrorMessage').removeClass('d-none');
                    return $('.sizeErrorMessage').removeClass('d-none');
                }
            }else if($('.colorOption').length){
                colorId = $('.colorOption').val();
                colorName = $('.colorOption').find("option:selected").text();
                //empty state
                if(colorId == ''){
                    return $('.colorErrorMessage').removeClass('d-none');
                }
            }else if($('.sizeOption').length){
                sizeId = $('.sizeOption').val();
                sizeName = $('.sizeOption').find("option:selected").text();
                //empty state
                if(sizeId == ''){
                    return $('.sizeErrorMessage').removeClass('d-none');
                }
            }

            $.ajax({
                url: "{{ route('frontend#addToCart') }}",
                method: "post",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    productId: productId,
                    colorId: colorId,
                    colorName: colorName,
                    sizeId: sizeId,
                    sizeName: sizeName,
                    qty: qty,
                    price: price,
                },
                success:function(response){
                    if(response.error){
                        Swal.fire({
                            icon: 'error',
                            title: response.error,
                        });
                    }else{
                        let headerCartBoxHtml = `
                            <span class="badge bg-dark rounded-circle mb-0 position-absolute cart-badge">${response.count}</span>
                            <p class="mb-0 py-2 px-2">CART - ${response.totalPrice} Ks</p>
                        `;
                        $('.headerCartBox').html(headerCartBoxHtml);
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    }
                }
            })
        }
    </script>
</body>
</html>
