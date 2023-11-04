@extends('layout.master')
@section('content')
    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">About us page</h1>
                    <p class="lead text-muted mb-0">
                        Tiles Luxury with many years of experience and a team of professional and skilled technical staff,
                        we have constructed many projects that are aesthetically pleasing and ensure quality.
                        Tiles Luxury's construction and installation services have gained trust and affirmed their position
                        in the hearts of customers.
                    </p>
                    <p class="lead text-muted mb-0">
                        Our team of experienced sales and technical consultants will be an effective assistant to help
                        customers conduct surveys, appraise, evaluate and provide advice on stone use as well as estimates.
                        budget for each item in the most optimal way.
                        The experience and ability of this team has been demonstrated in every project that Anphat Stone has
                        been implementing.
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('storage/homepage/logo.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">

                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto">
                        <img src="{{ asset('storage/homepage/daop.jpg') }}" alt="" class="img-fluid mb-4 mb-lg-0">
                    </div>
                    <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Reasons you should choose natural Granite & Marble products from Tiles
                            Luxury:</h2>
                        <p class="font-italic text-muted mb-4">
                            Natural stone has the ability to withstand heat quite well, is waterproof and does not peel or
                            deform like ceramic tiles you often see.
                            If you use them for floor tiling, they will give you a cool feeling in the summer and warmth in
                            the winter.
                            Tiles Luxury providing a variety of product designs, meeting the most stringent requirements of
                            customers.
                        </p>
                        <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="lead text-muted mb-0 ">
        <h5 style="text-align:center;
            padding :20px;">Sincerely thank you for your cooperation!!!</h5>
    </div>
@endsection
