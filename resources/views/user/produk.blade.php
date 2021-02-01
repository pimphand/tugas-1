@extends('user.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Produk</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row mb-5">
                    </div>
                    <div class="table-responsive">
                        <h4 class="text-center">Produk</h4>
                        <hr>
                        <table id="produk" class="display" style="width:100%" >
                          <thead>
                              <tr>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th></th>
                              </tr>
                          </thead>
                      </table>
                      </div>

                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-right">
                            <div class="site-block-27">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($categories as $categori)
                                <li class="mb-1"><a href="{{ route('user.kategori', ['id' => $categori->id]) }}"
                                        class="d-flex"><span>{{ $categori->name }}</span> <span class="text-black ml-auto">(
                                            {{ $categori->jumlah }} )</span></a>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('addJs')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
                    $(document).ready(function() {
                        $('#produk').DataTable({
                            processing: true,
                            serverSide: true,
                            url: 'dataTables.Indonesian.json',//aktifkan server-side
                            ajax: {
                                url: "/produk",
                                type: 'GET'
                            },
                            columns: [{
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'nama_kategori',
                                    name: 'nama_kategori'
                                },
                                {
                                    data: 'action',
                                    name: 'action'
                                },
                            ],
                            order: [
                                [0, 'asc']
                            ]
                        });
                    });

                </script>
@endsection
