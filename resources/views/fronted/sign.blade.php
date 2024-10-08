@extends('fronted.layout.main')

@section('main-container')
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{url('fronted/logo/1.png')}}" alt="" class="img-fluid w-75">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    {{-- <a href="{{ url('/') }}" class="mb-40 max-w-290-px">
                        <img src="{{ url('fronted/logo/dw_logo.png') }}" alt="">
                    </a> --}}
                    <h4 class="mb-12">Sign Up to your Account</h4>
                    <p class="mb-32 text-secondary-light text-lg">Welcome! Please enter your details</p>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="mb-16">
                        <div class="position-relative">
                            <div class="icon-field">
                                <input type="text" name="name" class="form-control h-56-px bg-neutral-50 radius-12"
                                    placeholder="Username" value="{{ old('name') }}">
                            </div>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-16">
                        <div class="position-relative">
                            <div class="icon-field">
                                <input type="email" name="email"
                                    class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-16">
                        <div class="position-relative">
                            <div class="icon-field">
                                <input type="password" name="password"
                                    class="form-control h-56-px bg-neutral-50 radius-12" id="your-password"
                                    placeholder="Password">
                            </div>
                            <span
                                class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                data-toggle="#your-password"></span>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                            <div class="mb-16">
                                <div class="d-flex align-items-start">
                                    <input class="form-check-input border border-neutral-300 mt-4" type="checkbox"
                                        name="terms" id="condition">
                                    <label class="form-check-label text-sm" for="condition">
                                        By creating an account means you agree to the
                                        <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Terms &
                                            Conditions</a> and our
                                        <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Privacy Policy</a>
                                    </label>
                                </div>
                                @error('terms')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">Sign Up</button>

                            <div class="mt-32 center-border-horizontal text-center">
                                <span class="bg-base z-1 px-4">Or sign up with</span>
                            </div>
                            <div class="mt-32 d-flex align-items-center gap-3">
                                <button type="button"
                                    class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                                    <iconify-icon icon="ic:baseline-facebook"
                                        class="text-primary-600 text-xl line-height-1"></iconify-icon>
                                    Facebook
                                </button>
                                <button type="button"
                                    class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                                    <iconify-icon icon="logos:google-icon"
                                        class="text-primary-600 text-xl line-height-1"></iconify-icon>
                                    Google
                                </button>
                            </div>
                            <div class="mt-32 text-center text-sm">
                                <p class="mb-0">Already have an account? <a href="{{ route('sign-in') }}"
                                        class="text-primary-600 fw-semibold">Sign In</a></p>
                            </div>
                </form>
            </div>
        </div>
    </section>
@endsection
