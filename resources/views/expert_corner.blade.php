@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Home</a></li>
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
                @foreach ($data as $each)
                    <a href="{{ route('blog_detail', ['blog'=>$each->id]) }}" class=" text-decoration-none">
                        <div class=" mb-3 text-start">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="{{ asset('storage/images/' . $each->image) }}" alt="" width="100%" height="300">
                                </div>
                                <div class="col-sm-8 text-start">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <h5>{{ $each->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
