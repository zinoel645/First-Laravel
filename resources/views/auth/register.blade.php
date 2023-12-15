@extends('layout.master')
@section('content')
    <section>
        <div style="margin: 80px 0 60px 0;" class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 col-lg-4 text-center">
                <img src="{{ asset('storage/homepage/logo.png') }}" class="img-fluid mb-4" alt="Sample image">
            </div>
            <div class="col-md-6 col-lg-4">
                <form action="{{ route('verify') }}" method="POST">
                    @csrf <!-- CSRF protection -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="user_name" class="form-control" 
                                placeholder="Username" value="{{ old('user_name') }}"/>
                                @if ($errors->has('user_name'))
                                    <span class="error">{{ $errors->first('user_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" 
                                placeholder="Password"/>
                                @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="full_name" class="form-control" 
                        placeholder="Full name" value="{{ old('full_name') }}"/>
                        @if ($errors->has('full_name'))
                            <span class="error">{{ $errors->first('full_name') }}</span>
                        @endif
                        <i class='bx bxs-low-vision mt-2'></i>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control" 
                        placeholder="Phone" value="{{ old('phone') }}"/>
                        @if ($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                        @endif
                        <i class='bx bxs-low-vision mt-2'></i>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control" 
                        placeholder="Email" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                        <i class='bx bxs-low-vision mt-2'></i>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address" class="form-control" 
                        placeholder="Address" value="{{ old('address') }}"/>
                        @if ($errors->has('address'))
                            <span class="error">{{ $errors->first('address') }}</span>
                        @endif
                        <i class='bx bxs-low-vision mt-2'></i>
                    </div>
                    <button type="submit" name="btn" class="btn btn-warning btn-lg w-100">
                        Register
                    </button>
                </form>

            </div>
        </div>
    </section>
@endsection
