<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV Murni Diesel &mdash; Toko Online </title>
    {{-- {!! SEOMeta::generate() !!}  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/fonts/icomoon/style.css"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/magnific-popup.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/jquery-ui.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.carousel.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.theme.default.min.css"> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css"> --}}
    @yield('c')
    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/style.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" /> --}}
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('depan') }}/stylesheet/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('depan') }}/stylesheet/colors/color1.css" id="colors">
    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('depan') }}/stylesheet/responsive.css">

    {{-- <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> --}}

</head>

<body>
    <div class="top style3 clearfix">
        <div class="container">
            <div class="flat-title-page">
                <p>Welcome to automov services for car</p>
            </div> <!-- /.flat-title-page -->

            <div id="logo" class="text-center">
                <a href="index.html"><img src="{{ asset('depan') }}/images/logo.png" alt="AutoMov" width="188" height="75" data-retina="images/logo-2x.png" data-width="188" data-height="75"></a>
            </div> <!-- /#logo -->

            <div class="flat-menu-extra">
                <ul>
                    @if (Route::has('login'))
                        @auth
                    <li class="cart nav-top-cart-wrapper">
                        <?php
                        $user_id = \Auth::user()->id;
                        $total_keranjang = \DB::table('keranjang')
                        ->select(DB::raw('count(id) as jumlah'))
                        ->where('user_id', $user_id)
                        ->first();
                        ?>
                        <?php
                        $user_id = \Auth::user()->id;
                        $total_order = \DB::table('order')
                        ->select(DB::raw('count(id) as jumlah'))
                        ->where('user_id', $user_id)
                        ->where('status_order_id', '!=', 5)
                        ->where('status_order_id', '!=', 6)
                        ->first();
                        ?>
                        <a href="{{ route('user.keranjang') }}"><span class="text">Total Order ({{ $total_order->jumlah }})</span></a> <span class="total-product">{{ $total_keranjang->jumlah }}</span>
                        {{-- </div> --}}
                        @else

                            <ul>
                        <a href="{{ route('user.keranjang') }}"><span class="text">Total Order </span></a> <span class="total-product"></span>
                            </ul>

                        @endauth
                    </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.top -->
            @include('user.header')
        </header>

        @yield('content')

        {{-- @include('user.footer') --}}
    </div>
    <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="{{ asset('shopper') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('shopper') }}/js/popper.min.js"></script>
    <script src="{{ asset('shopper') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('shopper') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('shopper') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('shopper') }}/js/aos.js"></script>
 {{-- carousel --}}

    @yield('js')
    @yield('script')
    @yield('addJs')
</body>
</html>
