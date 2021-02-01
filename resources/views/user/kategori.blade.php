@extends('user.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="{{ route('user.produk') }}">Produk</a><span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{ $categories->name }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="display-5" style="text-transform:uppercase">Produk Kategori {{ $categories->name }}</h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12 order-3">
                    <div class="row mb-5">
                        @foreach ($produks as $produk)
                            <div class="col-sm-12 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    {{-- <a
                                        href="{{ route('user.produk.detail', ['id' => $produk->id]) }}">
                                        <img src="{{ asset('storage/' . $produk->image) }}" alt="Image placeholder"
                                            class="img-fluid" width="100%" style="height:200px">
                                    </a> --}}
                                    <div class="block-4-text p-4">
                                        <h3><a
                                                href="{{ route('user.produk.detail', ['id' => $produk->id]) }}">{{ $produk->name }}</a>
                                        </h3>
                                        {{-- @guest
                                        <p>silahkan <a href="{{ route('login') }}">login</a> untuk menampilkan harga </p>
                                        @endguest
                                        @auth
                                        <p class="mb-0">RP {{ $produk->price }}</p>
                                        @endauth--}}
                                        <a href="{{ route('user.produk.detail', ['id' => $produk->id]) }}"
                                            class="btn btn-primary mt-2">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-right">
                            <div class="site-block-27">
                                {{ $produks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
