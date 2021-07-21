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
          <div class="card-body" id="divMap">
            <div class="row">
              <div class="col-md-12">
                {{-- <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}
                
                <div id="mapid" style="width: 100%; height: 600px">
                  <script>
                  </script>
                  <script src="{{ asset('js/leaflet.ajax.min.js') }}"></script>
                  <script src="{{ asset('js/kecamatan_json.js') }}"></script>
                  <script src="{{ asset('js/map.js') }}"></script>
                  <script>
                    // kecamatanLayer.addTo(map);
                  </script>
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
<!-- /.content -->
@endsection