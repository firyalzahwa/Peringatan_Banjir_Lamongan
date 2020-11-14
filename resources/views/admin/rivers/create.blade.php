@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Tinggi Sungai</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.rivers.index') }}">Data Sungai</a></li>
                    <li class="breadcrumb-item active">Tambah Data Tinggi Sungai</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    
    <div class="card card-info ml-4 mr-4 mt-4">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data Tinggi Sungai</h3>
        </div>
        
        <form class="form-horizontal" method="POST" action="{{route('admin.rivers.store')}}">
            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                
                <div class="row mt-3">
                    <label class="col-md-3">Lokasi Sungai</label>
                    <div class="col-md-6">
                        <select type="text" name="district_id" class="form-control">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($districts as $d)
                            <option value="{{ $d -> id}}">{{ $d -> title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <label class="col-md-3">Tanggal</label>
                    <div class="col-md-6">
                        <input type="date" name="tanggal" class="form-control" placeholder="tanggal"/>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <label class="col-md-3">Tinggi (cm)</label>
                    <div class="col-md-6">
                        <input type="text" name="tinggi" class="form-control" placeholder="Tinggi"/>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-info float-right" value="save" />
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</form>
</div>

</section>

@endsection