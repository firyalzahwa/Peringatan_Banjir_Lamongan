@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Halaman Riwayat Banjir</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Riwayat Banjir</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.histories.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus-square mr-2"></i>Tambah Data</a> 
    </p>
    
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Desa</th>
                  <th>Tanggal</th>
                  <th>Kapala Keluarga</th>
                  <th>Jiwa</th>
                  {{-- <th>Rumah</th>
                    <th>Sekolah</th>
                    <th>Kantor Desa</th>
                    <th>Sawah</th>
                    <th>Jalan</th> --}}
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($histories))
                  @foreach ($histories as $h)
                  <tr>
                    <td>{{ $h->village->title}}</td>
                    <td>{{ $h->tanggal}}</td>
                    <td>{{ $h->kepala_keluarga}}</td>
                    <td>{{ $h->jiwa}}</td>
                    {{-- <td>{{ $h->rumah}}</td>
                    <td>{{ $h->sekolah}}</td>
                    <td>{{ $h->kantor_desa}}</td>
                    <td>{{ $h->sawah}}</td>
                    <td>{{ $h->jalan}}</td> --}}
                    <td>
                      <a href="{{ route('admin.histories.show', $h->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye mr-2"></i>Detail </a>
                      <a href="{{ route('admin.histories.edit', $h->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-2"></i>Edit </a>
                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-secondary btn-sm"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                      <form action="{{ route('admin.histories.destroy', $h->id) }}" method="POST">
                        @method('DELETE')
                        <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr><td colspan="5">No Histories Found</td></tr>
                  @endif
                </tbody>
              </table>
              {{ $histories->render() }}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </div>
  </section>
  
  @endsection