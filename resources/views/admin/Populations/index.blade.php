@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Halaman Kepadatan Penduduk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Kepadatan Penduduk</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.populations.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus-square mr-2"></i>Tambah Data</a> 
    </p>
    
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Nama Desa</th>
                  <th>Kepadatan Penduduk</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if(count($populations))
                @foreach ($populations as $p)
                <tr>
                  <td>{{ $p->village->title}}</td>
                  <td>{{ $p->total}}</td>
                  <td>
                    <a href="{{ route('admin.populations.edit', $p->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-2"></i>Edit </a>
                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-secondary btn-sm"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                    <form action="{{ route('admin.populations.destroy', $p->id) }}" method="POST">
                      @method('DELETE')
                      <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                    </form>
                  </td>
                </tr>
                @endforeach
                @else
                <tr><td colspan="4">No Population Found</td></tr>
                @endif
              </tbody>
            </table>
            {{ $populations->render() }}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
    
  </div>
</section>

@endsection