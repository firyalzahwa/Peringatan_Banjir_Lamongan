@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Halaman Cuaca</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Cuaca</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid mt-7">
        <div class="row">
            <div class="col-md-5 ml-auto mr-auto">
                <div class="card shadow pb-3">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 mt-3 ml-2 mb-2">Cuaca Kabupaten Lamongan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tr>
                                <th>Tanggal  </th>
                                <td>: {{ date('d F Y') }}</td>
                             </tr>
                             <tr>
                                <th>Cuaca  </th>
                                <td>: {{ $decodedData->weather[0]->main }} </td>
                             </tr>
                             <tr>
                                <th>Keterangan Cuaca  </th>
                                <td>: {{ $decodedData->weather[0]->description }} </td>
                             </tr>
                             <tr>
                                <th>Temperatur Saat Ini  </th>
                                <td>: {{ $decodedData->main->temp }} C</td>
                             </tr>  
                             <tr>
                                <th>Temperatur Maksimal  </th>
                                <td>: {{ $decodedData->main->temp_max }} C</td>
                             </tr> 
                             <tr>
                                <th>Temperatur Minimal </th>
                                <td>: {{ $decodedData->main->temp_min }} C</td>
                             </tr> 
                             <tr>
                                <th>Kelembapan  </th>
                                <td>: {{ $decodedData->main->humidity }} %</td>
                             </tr> 
                             <tr>
                                <th>Kecepatan Angin  </th>
                                <td>: {{ $decodedData->wind->speed }} km/h</td>
                             </tr> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection