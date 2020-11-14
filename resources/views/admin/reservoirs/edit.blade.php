@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Tinggi Permukaan Tanah</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.reservoirs.index') }}">Data Waduk</a></li>
                    <li class="breadcrumb-item active">Edit Data Waduk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    
    <div class="card card-info ml-4 mr-4 mt-4">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data Waduk</h3>
        </div>
        
        <form class="form-horizontal" method="POST" action="{{route('admin.reservoirs.update', $reservoir->id)}}">
            @method('PUT')
            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                
                <div class="row mt-3">
                    <label class="col-md-3">Nama Waduk</label>
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" 
                        placeholder="Nama Waduk " value="{{ $reservoir->title}}" />
                    </div>
                </div>
                
                <div class="row mt-3">
                    <label class="col-md-3">Desa</label>
                    <div class="col-md-6">
                        <select type="text" name="village_id" class="form-control">
                            <option value="">Pilih Desa</option>
                            @foreach ($villages as $v)
                            <option value="{{ $v -> id}}" @if($v->id == $reservoir->village_id)
                                selected
                                @endif
                                
                                >{{ $v -> title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Kapasitas (m3)</label>
                        <div class="col-md-6">
                            <input type="number" name="kapasitas" class="form-control" 
                            placeholder="Kapasitas" value="{{ $reservoir->kapasitas}}" />
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