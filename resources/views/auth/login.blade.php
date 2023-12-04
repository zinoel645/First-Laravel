@extends('layout.master')
@section('content')
    @if (session('login-alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('login-alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section>
        <div style="margin: 80px 0;" class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 col-lg-4 text-center">
                <img src="{{ asset('storage/homepage/logo.png') }}" class="img-fluid mb-4" alt="Sample image">
            </div>
            <div style="padding-right: 100px; padding-left: 100px" class="col-md-6 col-lg-4">
                <form action="{{ route('process_login') }}" method="POST">
                    @csrf <!-- CSRF protection -->
                    <div class="mb-3">
                        <input type="text" name="user_name" class="form-control" placeholder="Username" />
                        @if ($errors->has('user_name'))
                            <span class="error">{{ $errors->first('user_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 align-items-center">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password" />
                        <input type="checkbox" id="toggle-password" class="ml-2">
                        <label for="toggle-password" class="ml-1">Show Password</label>
                        @if ($errors->has('password'))
                            <br>
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                        @if (session('error'))
                            <div style="padding: 0 10px;" class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" name="btn" class="btn btn-warning btn-lg w-100">
                        Login
                    </button>
                </form>
                <div class="mt-3">
                    <p class="fw-normal mb-0">Don't have an account? <a href="{{ route('register') }}"
                            class="link-danger">Register</a></p>
                </div>
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-normal mx-3 mb-0">Or</p>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                    <button type="button" class="btn btn-warning btn-floating mx-1">
                        <i class='bx bxl-meta'></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-floating mx-1">
                        <i class="fab fa-linkedin-in"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
