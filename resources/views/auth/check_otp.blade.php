@extends('layout.master')
@section('content')
    @if ($errors->has('code'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $errors->first('code') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- tạo form gửi code qua mail -->
    <form action="{{ route('user_store') }}" method="POST" style="margin: 100px 0;">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto d-flex flex-row align-items-center justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <label for="send">Enter code from your email:</label>
                        <input type="number" name="code" class="form-control my-3 py-2">
                        <div class="text-center mt-3">
                            <button class="btn btn-warning" name="send_code" type="submit">Verify</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
