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
                <div class="dropdown">
                  <button type="button" class="btn btn-s btn-info dropdown-toggle" data-toggle="dropdown">
                    Pilih peta yang ditampilkan
                  </button>
                  <div class="dropdown-menu" style="width: 100%">
                    <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid1" > Peta Desa</label></div>
                    <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid2" > Peta Kecamatan</label></div> 
                    {{-- <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid3" > Peta Tinggi Tanah</label></div>  --}}
                    <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid4" > Peta Riwayat Banjir</label></div>
                    <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid5" > Peta Rawan Banjir</label></div> 
                    {{-- <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid6" > Peta Tinggi Tanah</label></div> 
                    <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid7" > Peta Kepadatan Penduduk</label></div> 
                    <div class="checkbox dropdown-item"><label><input type="checkbox" id="dataid8" > Peta Waduk</label></div>  --}}
                  </div>
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
                  <script src="{{asset('js/kecamatan.js') }}"></script>
                  <script src="{{ asset('js/leaflet.ajax.min.js') }}"></script>
                  <script src="{{ asset('js/map.js') }}"></script>
                  <script>
                    kecamatanLayer.addTo(map);
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