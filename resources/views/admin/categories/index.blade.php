@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Kategori </h3>
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
                      <h4 class="card-title">Data Kategori</h4>
                      </div>
                      <div class="col text-right">
                      <a href="{{ route('admin.categories.tambah') }}" class="btn btn-primary">Tambah</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Nama Kategori</th>
                            <th width="15%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $categorie)
                            <tr>
                                <td align="center">{{ $categorie->id }}</td>
                                <td>{{ $categorie->name }}</td>
                                <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('admin.categories.edit',['id'=>$categorie->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="mdi mdi-tooltip-edit"></i>
                                  </a>
                                  <a href="{{ route('admin.categories.delete',['id'=>$categorie->id]) }}" onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                    <i class="mdi mdi-delete-forever"></i>
                                  </a>
                                </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection

@section('data_table')
<script>
      
  var t = $('#table').DataTable({
      "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets": 0
      } ],  
      "order": [[ 1, 'asc' ]],
      "language" : {
          "sProcessing" : "Sedang memproses ...",
          "lengthMenu" : "Tampilkan _MENU_ data per halaman",
          "zeroRecord" : "Maaf data tidak tersedia",
          "info" : "Menampilkan _PAGE_ halaman dari _PAGES_ halaman",
          "infoEmpty" : "Tidak ada data yang tersedia",
          "infoFiltered" : "(difilter dari _MAX_ total data)",
          "sSearch" : "Cari",
          "oPaginate" : {
              "sFirst" : "Pertama",
              "sPrevious" : "Sebelumnya",
              "sNext" : "Selanjutnya",
              "sLast" : "Terakhir"
          }
      }
  });
  t.on( 'order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      } );
  } ).draw();
</script>
@endsection