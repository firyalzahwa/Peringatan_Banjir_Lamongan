@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Halaman Peta Riwayat Banjir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.histories.index') }}">Data Riwayat Banjir</a></li>
                    <li class="breadcrumb-item active">Peta Riwayat Banjir</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        {{-- <p>
            <a href="{{route('admin.histories.create')}}" class="btn btn-primary">Tambah Data</a> 
        </p> --}}
        <h2 class="text-center">Desa {{ $history->village->title}}</h2>
        <div class="row ">
            <div class="card ml-auto mr-auto mt-3">
                <div id="mapid" style="width: 1000px; height: 500px">
                    <script>
                        var mymap = L.map('mapid').setView([-7.118736, 112.416550], 11);
                        L.tileLayer(
                        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/streets-v11',
                        }).addTo(mymap);
                        
                        L.marker([{{$history->village->lat_villages}},{{$history->village->long_villages}}]).addTo(mymap)
                        .bindPopup('Tanggal Kejadian : {{$history->tanggal}}, <br> Jumlah KK : {{$history->kepala_keluarga}}, <br> Jumlah Jiwa : {{$history->jiwa}}, <br> Jumlah Rumah : {{$history->rumah}}, <br> Jumlah Sekolah : {{$history->sekolah}}, <br> Jumlah Kantor Desa : {{$history->kantor_desa}}, <br> Luas Sawah : {{$history->sawah}}, <br> Tinggi Genangan : {{$history->jalan}}   ')
                        .openPopup();
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection