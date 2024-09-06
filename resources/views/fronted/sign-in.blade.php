@extends('fronted.layout.main')
@section('main-container')

<section class="auth bg-base d-flex flex-wrap">
    <div class="auth-left d-lg-block d-none">
        <div class="d-flex align-items-center flex-column h-100 justify-content-center">
            <img src="{{url('fronted/images/auth/auth-img.png')}}" alt="">
        </div>
    </div>
    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">
            <div>
                <a href="index.html" class="mb-40 max-w-290-px">
                    <img src="{{url('fronted/images/logo.png')}}" alt="">
                </a>
                <h4 class="mb-12">Sign In to your Account</h4>
                <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
            </div>
            @if(session('success'))
                <div class="alert alert-primary">
                    <p>{{session('success')}}</p>
            </div>
        @endif
@if(session('error'))
<div class="alert alert-danger">
<p>{{session('error')}}</p>
</div>
@endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="position-relative mb-20">
                <div class="icon-field ">
                    {{-- <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span> --}}
                    <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email" value="{{ old('email') }}" id="email" onblur="validateEmail()">
                </div>
                @error('email') <span id="error_email" class="text-danger">{{$message}}</span>

            @enderror
                </div>
                <div class="position-relative mb-20">
                    <div class="icon-field">
                        {{-- <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span> --}}
                        <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12" id="your-password" placeholder="Password" value="{{ old('password') }}" onblur="validatePassword()">
                    </div>
                @error('password') <span class="text-danger">{{$message}}</span>@enderror

                    <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                </div>
                <div class="">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remeber">
                            <label class="form-check-label" for="remeber">Remember me </label>
                        </div>
                        <a href="javascript:void(0)" class="text-primary-600 fw-medium">Forgot Password?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Sign In</button>

                <div class="mt-32 center-border-horizontal text-center">
                    <span class="bg-base z-1 px-4">Or sign in with</span>
                </div>
                <div class="mt-32 d-flex align-items-center gap-3">
                    <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                        <iconify-icon icon="ic:baseline-facebook" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                        Google
                    </button>
                    <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                        <iconify-icon icon="logos:google-icon" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                        Google
                    </button>
                </div>
                <div class="mt-32 text-center text-sm">
                    <p class="mb-0">Don’t have an account? <a href="{{url('sign-up')}}" class="text-primary-600 fw-semibold">Sign Up</a></p>
          <a href="{{url('auth/register-cover')}}">

                </div>

            </form>
        </div>
    </div>
</section>
@endsection
