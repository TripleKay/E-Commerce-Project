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
    <!-- data tables -->
     <link rel="stylesheet" href="{{ asset('admin/plugins/data_table/dataTables.bootstrap4.min.css') }}">
     {{-- custom css  --}}
    <link rel="stylesheet" href="{{ asset('frontEnd/resources/css/style.css')}}">
    <title>E-Market</title>

    <style>
        .autoCompleteSearch .searchOverlay{
            display: none;
        }

        .autoCompleteSearch .searchOverlay a{
            background: #fff;

            transition: .3s linear;
        }
        .autoCompleteSearch .searchOverlay a:hover{
            background: var(--bs-primary);
            color: #fff;
            letter-spacing: 1.5px;
            transition: .3s linear;
        }
    </style>
</head>
<body>
     <!-- -------------------------------PreLoader------------------------------------  -->
     <!-- <div class="d-flex justify-content-center align-items-center bg-primary vw-100 vh-100 position-fixed loader-container">
        <div class="loader">Loading...</div>
    </div> -->
    <!-- -------------------------------header-------------------------------------  -->
    <header class="">
        <!-- -------------------------------header1-------------------------------------  -->
        <div class="py-3 header-1 d-none d-sm-block bg-primary"  style="border-bottom: 1px solid #ffffff50 ;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-white d-flex align-items-center justify-content-between ">
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
        <div class="py-3 header-2 bg-primary" style="border-bottom: 1px solid #ffffff50 ;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="flex-wrap d-flex align-items-center justify-content-between header-2-container">
                            <!-- mobile menu btn  -->
                            <button class="text-white btn d-block d-sm-block d-md-none mobile-menu"><i class="fa-solid fa-bars" style="font-size: 25px ;"></i></button>
                            <!-- mobile menu btn  -->
                            <a href="{{ route('frontend#index') }}" class="p-0 btn">
                                <h3 class="mb-0 text-white logo">E-Market</h3>
                            </a>

                            <div class="position-relative autoCompleteSearch">
                                {{-- <form action="" class=""> --}}
                                    <div class="p-1 bg-white d-none d-sm-none d-md-flex rounded-pill header-search-bar">
                                        <input type="search" class="border-0 searchInput form-control" placeholder="search product....">
                                        <button class="text-white btn btn-primary">Search</button>
                                    </div>
                                {{-- </form> --}}
                                {{-- search overlay box   --}}
                                <div class="mt-2 border-0 shadow searchOverlay card position-absolute" style="left: 0; right: 0; z-index: 2000; border-radius: 15px; background-color: ##F8F7FF;">
                                    <div class="card-body resultProduct">

                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <a href="{{ route('frontend#viewCarts') }}" class="p-0 btn btn-outline-light position-relative d-flex justify-content-between align-items-center">
                                    <i class="px-2 py-2 fa-solid fa-cart-shopping" style="border-right: 1px solid #fff"></i>
                                    <div class="headerCartBox">
                                        <span class="mb-0 badge bg-dark rounded-circle position-absolute cart-badge">
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
                                            <p class="px-2 py-2 mb-0">CART - {{ $total}} Ks</p>
                                        @else
                                            <p class="px-2 py-2 mb-0">CART - 0 Ks</p>
                                        @endif
                                    </div>
                                </a>
                                {{-- <div class="border-0 shadow-lg cart-overlay card bg-primary position-absolute" style="top: 100%; bottom: 0; right: 0; width: 300px; z-index: 2000;">
                                    <div class="p-1 card-body">
                                        <div class="mb-1 card cart-item">
                                            <div class="p-1 card-body d-flex justify-content-between align-items-center">
                                                <img src="{{ asset('frontEnd/resources/image/product1.jpg') }}" alt="" srcset="" style="width: 80px; height: 80px">
                                                <div class="">
                                                    <p class="mb-0">Apple Watch</p>
                                                    <span>8 items</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 card cart-item">
                                            <div class="p-1 card-body d-flex justify-content-between align-items-center">
                                                <img src="{{ asset('frontEnd/resources/image/product1.jpg') }}" alt="" srcset="" style="width: 80px; height: 80px">
                                                <div class="">
                                                    <p class="mb-0">Apple Watch</p>
                                                    <span>8 items</span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="text-white btn btn-primary w-100">View All</a>
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
                                <button class="shadow-lg btn btn-light d-block d-md-none mobile-close"><i class="fa-solid fa-xmark" style="font-size: 25px ;"></i></button>
                                <!-- mobile close btn  -->
                                <div class="d-md-flex justify-content-between align-items-center">
                                    <ul class="nav d-flex align-items-center nav-bar">
                                        <!-- for mobile  -->
                                        <li class="mobile-search-bar d-md-none position-relative autoCompleteSearch">
                                            {{-- <form action="" class="px-2 py-3"> --}}
                                                <div class="p-1 rounded d-flex bg-primary" style="border: 1px solid #fff; ">
                                                    <button class="m-0 text-white btn rounded-circle"><i class="fas fa-search"></i></button>
                                                    <input type="text"  class="text-white bg-transparent border-0 mobileSearchInput form-control ms-0" placeholder="search .....">
                                                </div>
                                            {{-- </form> --}}
                                            {{-- search overlay box   --}}
                                                <div class="mt-2 border-0 shadow searchOverlay card position-relative" style="left: 0; right: 0; z-index: 2000; border-radius: 15px; background-color: ##F8F7FF;">
                                                    <div class="card-body resultProduct">

                                                    </div>
                                                </div>
                                        </li>
                                        <li class="nav-item cat-nav-item">
                                            <!-- all category btn  -->
                                            <div class="shadow dropdown me-3 cat-dropdown">
                                                <button class="py-3 text-white btn btn-info dropdown-toggle" style="border-radius: 0px;" type="button" id="category-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-list me-3 d-none d-sm-none d-md-inline-block"></i> ALL CATEGORIES
                                                </button>
                                                <!-- all category container  -->
                                                <ul class="shadow-lg dropdown-menu" aria-labelledby="category-btn" style="width: 100%; border-radius: 0px 0px 10px 10px">
                                                    <!-- -------------main cat item-----------------  -->
                                                    @php
                                                    $categories = App\Models\Category::get();
                                                    @endphp
                                                    @foreach ($categories as $cat)
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id',$cat->category_id)->get();
                                                        @endphp
                                                        <li class="cat-item">
                                                            <div class="py-2 my-1 d-flex align-items-center justify-content-between dropdown-item">
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
                                                                                <div class="px-3 mb-3 d-flex flex-column">
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
                                          <a class="text-white nav-link" href="{{ route('frontend#index') }}">HOME</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="text-white nav-link" href="#">BLOG</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="text-white nav-link" href="#">ABOUT US</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="text-white nav-link" href="#">CONTACT US</a>
                                        </li>
                                      </ul>
                                      <div class="d-flex">
                                        <div class="me-2 d-none d-md-block">
                                            <a href="{{ route('user#wishlist') }}" class="btn btn-outline-light" title="My Wishlist"><i class="fas fa-heart"></i></a>
                                        </div>
                                        <div class="myAccount me-2 position-relative d-none d-md-block">
                                            <div class=" btn btn-outline-light"><i class="fas fa-user-alt"></i></div>
                                            @if (auth()->check())
                                                <div class="border-0 myAccountOverlay card bg-primary position-absolute">
                                                    <div class="p-1 card-body d-flex flex-column">
                                                        <a href="{{ route('user#profile') }}" class="text-white btn btn-primary text-start">My Account</a>
                                                        <a href="{{ route('user#myOrder') }}" class="text-white btn btn-primary text-start">My Orders</a>
                                                        <hr class="my-1">
                                                        <form action="{{ route('logout') }}" method="post">
                                                            @csrf
                                                            <button class="text-white btn btn-primary w-100 text-start">logout</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="border-0 myAccountOverlay card bg-primary position-absolute">
                                                    <div class="p-1 card-body d-flex flex-column">
                                                        <a href="{{ route('login') }}" class="text-white btn btn-primary text-start">Login</a>
                                                        <a href="{{ route('register') }}" class="text-white btn btn-primary text-start">Register</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mt-2 mb-3 border-0 card bg-primary w-100 d-block d-md-none" style="border-radius: 15px">
                                            <div class="card-body">
                                                @if (auth()->check())
                                                    <h5 class="text-white">{{ auth()->user()->name }}</h5>
                                                    <hr class="bg-white">
                                                    <a href="{{ route('user#wishlist') }}" class="px-0 text-white btn" title="My Wishlist"><i class="fas fa-heart"></i> My WishList</a>
                                                    <a href="" class="px-0 text-white btn w-100 text-start"><i class="fas fa-shopping-bag"></i> My Orders</a>
                                                    <a href="{{ route('user#profile') }}" class="px-0 text-white btn w-100 text-start"><i class="fas fa-user-alt"></i> My Account</a>
                                                    <hr class="bg-white">
                                                    <form action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <button class="text-white btn btn-danger w-100 text-start">Logout</button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('login') }}" class="text-white btn text-start">Login</a>
                                                    <a href="{{ route('register') }}" class="text-white btn btn-danger text-start">Register</a>
                                                @endif
                                            </div>
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
                        <p class="mb-3 text-black-50 me-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates numquam ad consequunturesse.</p>
                        <div class="d-flex">
                            <div class="me-3 d-flex align-items-center justify-content-center bg-dark rounded-circle " style="width: 40px ; height: 40px; ">
                                <i class="text-white fa-brands fa-facebook"></i>
                            </div>
                            <div class="me-3 d-flex align-items-center justify-content-center bg-dark rounded-circle " style="width: 40px ; height: 40px; ">
                                <i class="text-white fa-brands fa-youtube"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-center bg-dark rounded-circle " style="width: 40px ; height: 40px; ">
                                <i class="text-white fa-brands fa-instagram"></i>
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
                        <div class="mb-3 d-flex align-items-center">
                            <i class="text-white fa-solid fa-map-location-dot bg-dark" style="font-size: 20px; padding: 10px;"></i>
                            <p class="mb-0 ms-3">Yangon,Myanmar</p>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="text-white fa-solid fa-phone bg-dark" style="font-size: 20px; padding: 10px;"></i>
                            <div class="">
                                <p class="mb-0 ms-3">+95 9123 4567 89</p>
                                <p class="mb-0 ms-3">+95 9123 4567 89</p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="text-white fa-solid fa-envelope bg-dark" style="font-size: 20px; padding: 10px;"></i>
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
                            <p class="py-3 mb-0 text-center text-white-50">www.e-market.com</p>
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
    {{-- datatable --}}
    <script src="{{ asset('admin/plugins/data_table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/data_table/dataTables.bootstrap4.min.js')}}"></script>
    {{-- custom js  --}}
    <script src="{{ asset('frontEnd/resources/js/script.js')}}"></script>
    @yield('script')
    <script>
        $(document).ready(function () {
        // DataTable
            $('#dataTable').DataTable();

        // autocomplete search
            $('.searchInput').on('keyup',function () {
                autoCompleteSearch('.searchInput');
            })

            $('.mobileSearchInput').on('keyup',function () {
                autoCompleteSearch('.mobileSearchInput');
            })
        });

        // autocomplete search
        function autoCompleteSearch(className){
            let searchKey = $(className).val();
                if(searchKey != ''){
                    $.ajax({
                        url: "{{ route('frontend#searchProduct') }}",
                        method: "get",
                        dataType: "json",
                        data: {
                            searchKey: searchKey,
                        },
                        success:function(response){
                            $('.searchOverlay').show();
                            if(response.searchResult.length != 0){
                                let productHtml = '';
                                for(let i=0; i < response.searchResult.length; i++){
                                    productHtml += `<a href="{{ url('product/detail/') }}/${response.searchResult[i].product_id}" class="mt-2 btn w-100 d-flex justify-content-between align-items-center" style="border: 1px solid #88888840">
                                            <p class="mb-0">${response.searchResult[i].name.substring(0,80)}</p>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>`;
                                }
                                $('.resultProduct').html(productHtml);
                            }else{
                                let productHtml = `<div class="text-center">
                                            <h5 class="mb-0 text-danger">Products Not Found</h5>
                                        </div>`;
                                $('.resultProduct').html(productHtml);

                            }
                        }
                    })
                }else{
                    $('.searchOverlay').hide();
                }
        }

        //sweet alert
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
        //session message
        @if (Session::has('success'))
            Toast.fire({
                        icon: 'success',
                        title: "{{ Session::get('success') }}",
                    })
        @endif
        @if (Session::has('error'))
            Swal.fire({
                        icon: 'error',
                        title: "{{ Session::get('error') }}",
                    })
        @endif
        //auth check
        var authStatus = @if (auth()->check())
                'true';
            @else
                'false';
            @endif
        //add to cart
        function addToCart(id,amount){
            if(authStatus == 'true'){
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
                                <span class="mb-0 badge bg-dark rounded-circle position-absolute cart-badge">${response.count}</span>
                                <p class="px-2 py-2 mb-0">CART - ${response.totalPrice} Ks</p>
                            `;
                            $('.headerCartBox').html(headerCartBoxHtml);
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            })
                        }
                    }
                })
            }else{
                Swal.fire({
                            icon: 'info',
                            title: 'Please,Login First?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                            denyButtonText: `Register`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('login') }}";
                            } else if (result.isDenied) {
                                window.location.href = "{{ route('register') }}";
                            }
                        })
            }

        }
        //add to wishlist
        function addToWishList(id){

            if(authStatus == 'true'){
                $.ajax({
                    url: "{{ url('user/wishlist/add') }}/"+id,
                    method: "post",
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success:function(response){
                        if(response.error){
                            Swal.fire({
                                icon: 'error',
                                title: response.error,
                            });
                        }else{
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            });
                        }
                    }

                })
            }else{
                Swal.fire({
                            icon: 'info',
                            title: 'Please,Login First?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                            denyButtonText: `Register`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('login') }}";
                            } else if (result.isDenied) {
                                window.location.href = "{{ route('register') }}";
                            }
                        })
            }

        }
    </script>
</body>
</html>
