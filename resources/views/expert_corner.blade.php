@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./main.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Expert Corner</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1>Expert Corner</h1>
            <div class="py-5 col-12 text-center ">
                <a href="../view/blog_detail.php?blog_id=" class=" text-decoration-none">
                    <div class=" mb-3 text-start">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="" alt="" width="100%" height="300">
                            </div>
                            <div class="col-sm-8 text-start">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
