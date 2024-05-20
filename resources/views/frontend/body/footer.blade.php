<div class="footer">
    <div class="newsletterbg clearfix">

        <div class="container">

            <form action="{{ route('store.subscribe') }}" method="post" class="footer-newsletter">
                @csrf
                <div class="row align-items-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3 mb-md-0">
                        <label class="h3 mb-1 clr-none">Sign Up Our Newsletter & Get 10% OFF</label>
                        <p>Sign up to stay in the loop. Receive updates, access to exclusive deals, and more.</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="input-group">
                            <input type="email" class="form-control input-group-field newsletter-input" autocomplete="off" name="email"
                                value="" placeholder="Enter your email address..." required />
                            <button type="submit" class="input-group-btn btn btn-secondary newsletter-submit"
                                name="commit">Subscribe</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="footer-top clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                    <h4 class="h4">Informations</h4>
                    <ul>
                        <li><a href="{{ route('vendor.login') }}">Vendor Account</a></li>
                        <li><a href="{{ route('index') }}">About us</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('index') }}">Privacy policy</a></li>
                        <li><a href="{{ route('index') }}">Terms &amp; condition</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                    <h4 class="h4">Quick Link</h4>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('index') }}">About</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                    <h4 class="h4">Customer Services</h4>
                    <ul>
                        <li><a href="{{ route('track.order') }}">Track Order</a></li>
                        <li><a href="{{ route('index') }}">FAQ's</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('index') }}">Orders and Returns</a></li>
                        <li><a href="{{ route('index') }}">Support Center</a></li>
                    </ul>
                </div>

                @php
                    $sitting = App\Models\Sitting::find(1);
                @endphp

                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-contact">
                    <h4 class="h4">Contact Us</h4>
                    <p class="address d-flex"><i class="icon anm anm-map-marker-al pt-1"></i> {{ $sitting->address }}
                    </p>
                    <p class="phone d-flex align-items-center"><i class="icon anm anm-phone-l"></i> <b
                            class="me-1 d-none">Phone:</b> <a href="tel:401234567890">(+88) {{ $sitting->phone }}</a>
                    </p>
                    <p class="email d-flex align-items-center"><i class="icon anm anm-envelope-l"></i> <b
                            class="me-1 d-none">Email:</b> <a href="mailto:info@example.com">{{ $sitting->email }}</a>
                    </p>

                    <ul class="list-inline social-icons mt-3">

                        <li class="list-inline-item"><a href="{{ $sitting->facebook }}" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Facebook"><i class="icon anm anm-facebook-f"></i></a>
                        </li>

                        <li class="list-inline-item"><a href="{{ $sitting->twitter }}" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Twitter"><i class="icon anm anm-twitter"></i></a></li>


                        <li class="list-inline-item"><a href="{{ $sitting->linkdin }}" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Linkedin"><i class="icon anm anm-linkedin-in"></i></a>
                        </li>

                        <li class="list-inline-item"><a href="{{ $sitting->intagram }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Instagram"><i class="icon anm anm-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="d-flex-center flex-column justify-content-md-between flex-md-row-reverse">
                <img src="{{ asset('frontend/assets/images/icons/ssl.png') }}" style="width: 350px;" alt="">
                <div class="copytext">{{ $sitting->copyright }}</div>
            </div>
        </div>
    </div>
</div>
