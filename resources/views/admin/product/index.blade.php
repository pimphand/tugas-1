@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Produk </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Data Produk</h4>
                      </div>
                      <div class="col text-right">
                      <a href="{{ route('admin.product.tambah') }}" class="btn btn-primary">Tambah</a>
                      </div>
                    </div>
                    
                    <div class="table-responsive">
                      <table id="tabel_produk" class="display" style="width:100%" >
                        <thead>
                            <tr>
                              <th>Nama Produk</th>
                              <th>Kategori</th>
                              <th>Harga</th>
                              <th>Unit</th>
                              <th>aksi</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
@section('css')
<link href="cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('addJs')
<script src="cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
                    $(document).ready(function() {
                        $('#tabel_produk').DataTable({
                            processing: true,
                            serverSide: true, //aktifkan server-side 
                            ajax: {
                                url: "{{ route('admin.product') }}",
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
                                    data: 'price',
                                    name: 'price'
                                },
                                {
                                    data: 'weigth',
                                    name: 'weigth'
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