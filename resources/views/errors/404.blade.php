@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce | 404
@endsection

<!--Main Content-->
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center">
            <div class="error-content py-4">
                <div class="four0-img">

                    <svg xmlns="" viewBox="0 0 1920 1080">

                        <g id="fortyfour" data-name="Layer 2">
                            <g class="four a">
                                <rect class="cls-2" x="233.74" y="391.14" width="120.71" height="466.29" rx="57.1"
                                    ry="57.1" transform="translate(918.39 330.19) rotate(90)" />
                                <rect class="cls-3" x="333.83" y="475.1" width="120.71" height="396.88" rx="60.36"
                                    ry="60.36" />
                                <rect class="cls-3" x="197.13" y="122.89" width="120.71" height="604.75" rx="60.36"
                                    ry="60.36" transform="translate(290.49 -70.78) rotate(35)" />
                            </g>
                            <g class="four b">
                                <rect class="cls-2" x="1558.84" y="391.91" width="120.71" height="466.29"
                                    rx="57.1" ry="57.1" transform="translate(2244.26 -994.14) rotate(90)" />
                                <rect class="cls-3" x="1658.92" y="475.87" width="120.71" height="396.88"
                                    rx="60.36" ry="60.36" />
                                <rect class="cls-3" x="1522.22" y="123.66" width="120.71" height="604.75"
                                    rx="60.36" ry="60.36" transform="translate(530.57 -830.68) rotate(35)" />
                            </g>
                            <path class="cls-3" id="ou"
                                d="M956.54,168.2c-194.34,0-351.89,157.55-351.89,351.89S762.19,872,956.54,872s351.89-157.55,351.89-351.89S1150.88,168.2,956.54,168.2Zm0,584.49c-128.46,0-232.6-104.14-232.6-232.6s104.14-232.6,232.6-232.6,232.6,104.14,232.6,232.6S1085,752.69,956.54,752.69Z" />
                        </g>


                    </svg>

                </div>
                <h2 class="fs-4 mt-4">Oops! The page you requested was not found!</h2>
                <p class="mb-4">The page you are looking for was moved, removed, renamed or might never
                    existed.</p>

                <p class="same-width-btn"><a href="{{ route('index') }}" class="btn btn-secondary btn-lg mb-2 mx-3">Go
                        Back</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--End Main Content-->

@endsection
