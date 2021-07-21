@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Halaman Sungai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
          <li class="breadcrumb-item active"> Sungai</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.rivers.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus-square mr-2"></i>Tambah Data</a> 
    </p>
    <div class="row">
      <div class="col-12">
        <div class="card">
          {{-- <div class="card-header">
            <h3 class="card-title">Tabel Genangan</h3>
          </div> --}}
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID Dist</th>
                  <th>Lokasi</th>
                  <th>Tinggi Sungai (m)</th>
                  {{-- <th>Kategori Tinggi</th> --}}
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if(count($river))
                @foreach ($river as $r)
                <tr>
                  <td>{{ $r->id_dist}}</td>
                  <td>{{ $r->kecamatan}}</td>                    
                  <td>{{ $r->jum_sungai}}</td>
                  {{-- <td>{{ $r->river_category}}</td> --}}
                  <td>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-2"></i>Edit </a>
                    <a href="#" onclick="$(this).parent().find('form').submit()" class="btn btn-secondary btn-sm"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                    <form action="#" method="POST">
                      @method('DELETE')
                      <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                    </form>
                  </td>
                </tr>
                @endforeach
                @else
                <tr><td colspan="4">No Rivers Found</td></tr>
                @endif
              </tbody>
            </table>
            {{ $river->render() }}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
  </div>
</section>

@endsection