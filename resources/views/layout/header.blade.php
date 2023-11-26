<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light " aria-label="Main navigation" id="header">
    <div class="container-fluid mx-4">
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('main') }}">
            <img src="{{ asset('storage/homepage/logo.png') }}" alt="logo" width="100px" height="70px"
                class="navbar-brand">
        </a>
        <div class="navbar-collapse offcanvas-collapse px-2 text-warning" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-warning main-menu">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('shop') }}">Shop</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('shop', ['cate' => 1]) }}"
                        data-bs-toggle="dropdown" aria-expanded="false">Wall tiles</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('shop', ['cate' => 1]) }}">All Wall tiles</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 1, 'subcate' => 3]) }}">Bathroom</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 1, 'subcate' => 4]) }}">Kitchen</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 1, 'subcate' => 7]) }}">Outdoor</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop', ['cate' => 1, 'subcate' => 6]) }}">Living
                                room</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 1, 'subcate' => 5]) }}">Bedroom</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('shop', ['cate' => 2]) }}"
                        data-bs-toggle="dropdown" aria-expanded="false">Floor tiles</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('shop', ['cate' => 2]) }}">All Floor tiles</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 2, 'subcate' => 3]) }}">Bathroom</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 2, 'subcate' => 4]) }}">Kitchen</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 2, 'subcate' => 7]) }}">Outdoor</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop', ['cate' => 2, 'subcate' => 6]) }}">Living
                                room</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('shop', ['cate' => 2, 'subcate' => 5]) }}">Bedroom</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expert') }}">Expert corner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://www.canva.com/design/DAFxI2DMw7I/DOMNh-qwjVs0hjdxzmMR8Q/view?utm_content=DAFxI2DMw7I&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink&mode=preview">E-Catalogue</a>
                </li>
            </ul>
        </div>

        <div class="row flex-nowrap">
            <div class="col-10 button-offcanvas d-none d-lg-flex justify-content-between">
                @auth
                    @if (Auth::user()->utype === 'ADM')
                        <a href="{{ route('admin.index') }}" class="text-decoration-none">
                        @else
                            <a href="{{ route('user.index') }}" class="text-decoration-none">
                    @endif
                    <button class="btn btn-primary">
                        <i class="fas fa-user">
                        </i></button>
                    </a>
                    <div class="text-start">
                        Welcome, <br>
                        {{ Auth::user()->full_name }}
                        <a style="text-decoration: none;" href=""
                            onclick="event.preventDefault(); document.getElementById('frmlogout').submit();"><i
                                class="fa-solid fa-right-from-bracket"></i>Log out</a>
                        <form id="frmlogout" action="" method="POST">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('admin.index') }}" class="text-decoration-none">
                        <button class="btn btn-primary">
                            <i class="fas fa-user">
                            </i></button>
                    </a>
                @endauth


            </div>
            <div class="col-2">
                <button class="btn btn-primary position-relative btn-cart" style="transform:translateX(-10px)">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span
                        class="check-empty-cart position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <span class="position-unset"></span>
                    </span>
                    <div class="header_cart position-absolute z-2 rounded-1 border">
                        <div class="header__cart-heading">
                            <p>Sản phẩm đã thêm</p>
                        </div>
                        <div class="header__cart-body">
                            <div class="container px-0 py-2 pe-2">
                                <div class="row gx-3">
                                    <div class="col-3"><img src="" alt="Product Image" class="w-100">
                                    </div>
                                    <div class="col-9">
                                        <div class="row gx-2">
                                            <div class="col-8 text-start">
                                                <p class="text-dark mb-0"></p>
                                            </div>
                                            <div class="col-4 text-end">
                                                <p class="text-warning  mb-0">Price:F</p>
                                            </div>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-6 text-start">
                                                <p class="text-gray mb-0">Quantity:</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <a href="" class="text-danger ">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header__cart-footer py-2">
                            <div class="d-flex justify-content-around">
                                <a href="" class="btn btn-primary">Check cart</a>
                                <a href="" class="btn btn-primary">Checkout</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </button>
    </div>
</nav>
