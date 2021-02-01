@extends('user.app')
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Contact</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Map</h2>
                </div>
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.4797976108066!2d111.51636001450719!3d-7.631437277586081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be5ea1c245e5%3A0x3373576ab105ea54!2sDiesel%20Murni.%20CV!5e0!3m2!1sid!2sid!4v1606106162744!5m2!1sid!2sid"
                        width="660" height="526" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="p-4 border mb-3">
                        <span class="d-block  h6 text-uppercase">Alamat</span>
                        <p class="mb-0">Jl. Kutai No.27, Pandean, Kec. Taman, Kota Madiun, Jawa Timur 63133</p>
                    </div>
                    <div class="p-4 border mb-3">
                        <span class="d-block h6 text-uppercase">Social Media</span>
                        <p> <i class="fa fa-facebook fa-lg"> <a href="https://www.facebook.com/cvmurnidiesel"
                                    target="_blank" rel="nofollow" title="facebook">
                                    Facebook</i>
                            </a> </p>
                        <i class="fa fa-instagram fa-lg"> <a href="https://www.instagram.com/cvmurnidiesel/" target="_blank"
                                rel="nofollow" title="instagram">
                                Instagram
                            </a></i>
                    </div>
                    <div class="p-4 border mb-3">
                        <span class="d-block  h6 text-uppercase">Toko Online</span>
                        <p>
                            <a href="https://shopee.co.id/cvmurnidiesel" target="_blank" rel="nofollow" title="shopee">
                                <img class="asd"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsf4W3LjMpxir3PkmTeGM_JQgVB0-HHzvo2Q&usqp=CAU">
                                Shopee
                            </a>
                        </p>
                        <p>
                            <a href="https://www.bukalapak.com/u/cv_murni_diesel" target="_blank" rel="nofollow"
                                title="bukalapak">
                                <img class="asd"
                                    src="https://img2.pngio.com/icon-bukalapak-png-4-official-website-of-live-watch-store-bukalapak-png-1200_1200.png">
                                Bukalapak
                            </a>
                        </p>
                        <p>
                            <a href="https://www.tokopedia.com/cvmurnidiesel" target="_blank" rel="nofollow"
                                title="tokopedia">
                                <img class="asd"
                                    src="https://www.fariswooden.com/wp-content/uploads/2018/05/Tokopedia-Icon-Bulat-01-1.png">
                                Tokopedia
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('fa') }}/css/font-awesome.min.css">
    <style>
        .asd {
            object-fit: cover;
            width: 30px;
            height: 30px;
        }

    </style>
@endsection
