<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title Of Site -->
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style-min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

    {{-- Toaster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="account-page login-page">
    <!--Page Wrapper-->
    <div class="page-wrapper">

        <!--Top Header-->
        {{-- <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-sm-6 col-md-3 col-lg-4 text-left">
                        <i class="icon anm anm-phone-l me-2"></i><a href="tel:401234567890">(+40) 123 456 7890</a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 text-center d-none d-md-block">
                        Free shipping on all orders over $99 <a href="#" class="text-link ms-1">Shop now</a>
                    </div>
                    <div
                        class="col-6 col-sm-6 col-md-3 col-lg-4 text-right d-flex align-items-center justify-content-end">
                        <div class="select-wrap language-picker float-start">
                            <ul class="default-option">
                                <li>
                                    <div class="option english">
                                        <div class="icon"><img src="{{ asset('frontend/assets/images/flag/english.png') }}" alt="english"
                                                width="24" height="24" /></div><span>English</span>
                                    </div>
                                </li>
                            </ul>
                            <ul class="select-ul">
                                <li>
                                    <div class="option english">
                                        <div class="icon"><img src="{{ asset('frontend/assets/images/flag/english.png') }}" alt="english"
                                                width="24" height="24" /></div><span>English</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="select-wrap currency-picker float-start">
                            <ul class="default-option">
                                <li>
                                    <div class="option USD">
                                        <div class="icon"><img src="{{ asset('frontend/assets/images/flag/usd.png') }}" alt="usd"
                                                width="24" height="24" /></div><span>USD</span>
                                    </div>
                                </li>
                            </ul>
                            <ul class="select-ul">
                                <li>
                                    <div class="option USD">
                                        <div class="icon"><img src="{{ asset('frontend/assets/images/flag/usd.png') }}" alt="usd"
                                                width="24" height="24" /></div><span>USD</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--End Top Header-->

        <!--Header-->
        <header class="header d-flex align-items-center header-1 header-fixed">
            <div class="container">
                <div class="row">
                    <!--Logo-->
                    <div class="logo col-5 col-sm-3 col-md-3 col-lg-2 align-self-center">
                        <a class="logoImg" href="index.html"><img src="{{ asset('frontend/assets/images/logo.png') }}"
                                alt="Hema Multipurpose Html Template" title="Hema Multipurpose Html Template"
                                width="149" height="39" /></a>
                    </div>
                    <!--End Logo-->
                    <!--Menu-->
                    <div class="col-1 col-sm-1 col-md-1 col-lg-8 align-self-center d-menu-col">
                        <nav class="navigation" id="AccessibleNav">
                            <ul id="siteNav" class="site-nav medium center">

                                <li class="lvl1 parent dropdown"><a href="{{ route('index') }}">Home</a>
                                </li>

                                <li class="lvl1 parent dropdown"><a href="{{ route('index') }}">About</a>
                                </li>

                                <li class="lvl1 parent dropdown"><a href="{{ route('index') }}">Product</a>
                                </li>

                                <li class="lvl1 parent dropdown"><a href="{{ route('index') }}">Blog</a>
                                </li>

                                <li class="lvl1 parent dropdown"><a href="{{ route('index') }}">Contact</a>
                                </li>


                            </ul>
                        </nav>
                    </div>
                    <!--End Menu-->

                    <!--Right Icon-->
                    <div class="col-7 col-sm-9 col-md-9 col-lg-2 align-self-center icons-col text-right">


                        <!--Account-->
                        <div class="account-parent iconset">
                            <div class="account-link" title="Account"><i class="hdr-icon icon anm anm-user-al"></i>
                            </div>
                            <div id="accountBox">
                                <div class="customer-links">
                                    <ul class="m-0">

                                        <li><a href="{{ route('login') }}"><i class="icon anm anm-sign-in-al"></i>Sign In</a>
                                        </li>

                                        <li><a href="{{ route('register') }}"><i class="icon anm anm-user-al"></i>Register</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Account-->

                        <!--Wishlist-->
                        <div class="wishlist-link iconset" title="Wishlist"><a href="wishlist-style1.html"><i
                                    class="hdr-icon icon anm anm-heart-l"></i><span
                                    class="wishlist-count">0</span></a></div>
                        <!--End Wishlist-->

                        <!--Minicart-->
                        <div class="header-cart iconset" title="Cart">
                            <a href="#;" class="header-cart btn-minicart clr-none" data-bs-toggle="offcanvas"
                                data-bs-target="#minicart-drawer"><i class="hdr-icon icon anm anm-cart-l"></i><span
                                    class="cart-count">0</span></a>
                        </div>
                        <!--End Minicart-->

                    </div>
                    <!--End Right Icon-->
                </div>
            </div>
        </header>
        <!--End Header-->
        

        <!-- Body Container -->
        <div id="page-content my-auto">

            <!--Page Header-->
            <div class="page-header text-center">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                            <div class="page-title">
                                <h1>Login</h1>
                            </div>
                            <!--Breadcrumbs-->
                            <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                                    class="title"><i class="icon anm anm-angle-right-l"></i>My Account</span><span
                                    class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>Login</span>
                            </div>
                            <!--End Breadcrumbs-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Page Header-->

            <!--Main Content-->
            <div class="container my-5">
                <div class="login-register pt-2">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                            <div class="inner h-100">

                                <form method="post" action="{{ route('login') }}" class="customer-form">

                                    @csrf

                                    <h2 class="text-center fs-4 mb-3">Login</h2>

                                    <p class="text-center mb-4">If you have an account with us, please log in.</p>

                                    <div class="form-row">

                                        <div class="form-group col-12">

                                            <label for="CustomerEmail">Email Or Phone<span
                                                    class="required">*</span></label>

                                            <input type="login" name="login"
                                                class=" @error('login') is-invalid @enderror" autocomplete="off"
                                                required />

                                            @error('login')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="form-group col-12">

                                            <label for="CustomerPassword">Password <span
                                                    class="required">*</span></label>

                                            <input type="password" name="password" autocomplete="off" required />

                                        </div>

                                        <div class="form-group col-12">
                                            <div
                                                class="login-remember-forgot d-flex justify-content-between align-items-center">

                                                <div class="remember-check customCheckbox">
                                                    <input name="remember" id="remember_me" type="checkbox" />

                                                    <label for="remember_me"> Remember me</label>
                                                </div>

                                                <a href="{{ route('password.request') }}">Forgot your password?</a>

                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-0">
                                            <input type="submit" class="btn btn-primary btn-lg w-100"
                                                value="Sign In" />
                                        </div>
                                    </div>

                                    <div class="login-divide"><span class="login-divide-text">OR</span></div>

                                    <p class="text-center fs-6 text-muted mb-3">Sign in with social account</p>
                                    <div class="login-social d-flex-justify-center">
                                        <a class="social-link facebook rounded-5 d-flex-justify-center"
                                            href="#"><i class="icon anm anm-facebook-f me-2"></i> Facebook</a>
                                        <a class="social-link google rounded-5 d-flex-justify-center"
                                            href="#"><i class="icon anm anm-google-plus-g me-2"></i> Google</a>
                                    </div>

                                    <div class="login-signup-text mt-4 mb-2 fs-6 text-center text-muted">Don,t have an
                                        account? <a href="{{ route('register') }}" class="btn-link">Sign up now</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->

        </div>
        <!-- End Body Container -->

        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->

        <!-- Including Jquery/Javascript -->

        <!-- Plugins JS -->
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

        {{-- Toatsr --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

    </div>
    <!--End Page Wrapper-->
</body>

</html>


{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
