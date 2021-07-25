@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-12">
        <input aria-label="" id="viewMap" value="0" hidden>
        <div class="card">
          <div class="card-header">
            <h4 class="text-dark" id="titleMode">Peta Lamongan</h4>
            <div class="card-tools">
              <div class="col">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Pilih Peta</label>
                  <select class="form-control" id="select-pilih-peta">
                    <option>Pilih Data</option>
                    <option data-url="{{route('fahp')}}">peta rawan Fahp</option>
                    <option data-url="{{route('ahp')}}">peta rawan AHP</option>
                    <option data-url="{{route('histoty_map')}}">peta riwayat</option>
                  </select>
                </div>
              </div>
            </div>         
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="">
            <div class="row">
              <div class="col-md-12">
                <div id="mapid" style="width: 100%; height: 600px"></div>
                <div class="map-overlay" id="features">
                  <h2>Kecamatan Kabupaten Lamongan</h2>
                  <div id="pd"><p>Hover over a state!</p></div>
                </div>
                <div class="map-overlay" id="legend">
                  <div><span class="legend-key" style="background-color: #00ff00;"></span><span>Rendah</span></div>
                  <div><span class="legend-key" style="background-color: #ffff00;"></span><span>Sedang</span></div>
                  <div><span class="legend-key" style="background-color: #ff0000;"></span><span>Tinggi</span></div>

                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
          
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    
    <!-- Main row -->
    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>
<script src="{{ asset('js/leaflet.ajax.min.js') }}"></script>
<script src="{{ asset('js/kecamatan_json.js') }}"></script>
<script src="{{ asset('js/map.js') }}"></script>
<!-- /.content -->
@endsection