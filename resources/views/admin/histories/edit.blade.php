@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Riwayat Banjir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.histories.index') }}">Data Riwayat Banjir</a></li>
                    <li class="breadcrumb-item active">Edit Data Riwayat Banjir</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    
    <div class="card card-info ml-4 mr-4 mt-4">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data Riwayat Banjir</h3>
        </div>
        
        <form class="form-horizontal" method="POST" action="{{route('admin.histories.update', $history->id)}}">
            @method('PUT')
            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token()}} ">
                
                <div class="row mt-3">
                    <label class="col-md-3">Desa</label>
                    <div class="col-md-6">
                        <select type="text" name="village_id" class="form-control">
                            <option value="">Pilih Desa</option>
                            @foreach ($villages as $v)
                            <option value="{{ $v -> id}}" @if($v->id == $history->village_id)
                                selected
                                @endif
                                
                                >{{ $v -> title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Tanggal</label>
                        <div class="col-md-6">
                            <input type="date" name="tanggal" class="form-control" 
                            placeholder="Tanggal" value="{{ $history->tanggal}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Kepala Keluarga</label>
                        <div class="col-md-6">
                            <input type="number" name="kepala_keluarga" class="form-control" 
                            placeholder="kepala_keluarga" value="{{ $history->kepala_keluarga}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Jiwa</label>
                        <div class="col-md-6">
                            <input type="number" name="jiwa" class="form-control" 
                            placeholder="Jiwa" value="{{ $history->jiwa}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Rumah</label>
                        <div class="col-md-6">
                            <input type="number" name="rumah" class="form-control" 
                            placeholder="Rumah" value="{{ $history->rumah}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Sekolah</label>
                        <div class="col-md-6">
                            <input type="number" name="sekolah" class="form-control" 
                            placeholder="KateSekolahgori " value="{{ $history->sekolah}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Kantor Desa</label>
                        <div class="col-md-6">
                            <input type="number" name="kantor_desa" class="form-control" 
                            placeholder="Kantor Desa" value="{{ $history->kantor_desa}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Sawah</label>
                        <div class="col-md-6">
                            <input type="text" name="sawah" class="form-control" 
                            placeholder="Sawah" value="{{ $history->sawah}}" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label class="col-md-3">Jalan</label>
                        <div class="col-md-6">
                            <input type="text" name="jalan" class="form-control" 
                            placeholder="Jalan" value="{{ $history->jalan}}" />
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