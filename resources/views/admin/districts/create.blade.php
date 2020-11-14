@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Kecamatan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.districts.index') }}">Data Kecamatan</a></li>
                    <li class="breadcrumb-item active">Tambah Data Kecamatan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    
    <div class="card card-info ml-4 mr-4 mt-4">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data Kecamatan</h3>
        </div>
        
        <form class="form-horizontal" method="POST" action="{{route('admin.districts.store')}}">
            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                
                <div class="row mt-3">
                    <label class="col-md-3">Nama Kecamatan</label>
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Nama Kecamatan"/>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <label class="col-md-3">Longitude Kecamatan</label>
                    <div class="col-md-6">
                        <input type="number" name="long_districts" class="form-control" placeholder="Longitude Kecamatan"/>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <label class="col-md-3">Latitude Kecamatan</label>
                    <div class="col-md-6">
                        <input type="number" name="lat_districts" class="form-control" placeholder="Latitude Kecamatan"/>
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