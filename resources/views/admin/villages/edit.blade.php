@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Desa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.villages.index') }}">Data Desa</a></li>
                    <li class="breadcrumb-item active">Edit Data Desa</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <form method="POST" action="{{route('admin.villages.update', $village->id)}}">
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token()}} ">
            <div class="form-group">
                <div class="row">
                    <label class="col-md-3">Nama Desa</label>
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" value="{{ $village->title}}"/>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <label class="col-md-3">Kecamatan</label>
                    <div class="col-md-6">
                        <select type="text" name="district_id" class="form-control">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($districts as $d)
                            <option value="{{ $d -> id}}"
                                
                                @if($d->id == $village->district_id)
                                selected
                                @endif
                                
                                >{{ $d -> title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Longitude Desa</label>
                        <div class="col-md-6">
                            <input type="number" name="long_villages" 
                            class="form-control" value="{{ $village->long_villages}}"/>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Latitude Desa</label>
                        <div class="col-md-6">
                            <input type="number" name="lat_villages" 
                            class="form-control" value="{{ $village->lat_villages}}"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="save"/>
                </div>
            </form> 
        </div>
    </section>
    
    @endsection