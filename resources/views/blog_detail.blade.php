@extends('layout.master')
@section('content')
    <div class="card mb-3">
        <img style="width: 50%;
        display: flex;
        text-align: center;
        margin: auto;"
            src="{{ asset('storage/images/' . $each->image) }}" alt="">
        <div class="card-body">
            <h3>{{ $each->title }}</h3>
            <p style="text-align: justify;" class="card-text">{{ $each->content }}</p>
            <p style="text-align: justify;" class="card-text"><small class="text-muted">
                    <h5>Được đăng vào: {{ $each->created_at }}</h5>
                </small></p>
        </div>
    </div>
@endsection
