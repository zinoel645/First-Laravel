<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-warning">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="{{ route('main.index') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ asset('storage/homepage/logo.png') }}" alt="logo" height="70">
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link link-dark px-0 align-middle">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link link-dark px-0"><i class="fs-4 bi-speedometer2"></i><span class="d-none d-sm-inline">Sales Information</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../view/order.php" class="nav-link link-dark px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Order Status</span></a>
            </li>
            
            <li>
                <a href="{{ route('product.index') }}" class="nav-link link-dark px-0 align-middle">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
            </li>
            <li>
                <a href="../view/member.php" class="nav-link link-dark px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Contact</span> </a>
            </li>
            <li>
                <a href="{{ route('blog.index') }}" class="nav-link link-dark px-0 align-middle">
                    <i class="fs-4 bi-substack"></i> <span class="ms-1 d-none d-sm-inline">Blog</span> </a>
            </li>
        </ul>
        
    </div>
</div>