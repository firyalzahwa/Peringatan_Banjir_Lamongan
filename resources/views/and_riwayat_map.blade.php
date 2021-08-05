<html>
    <body>
        <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-12" style="display-non">
        <input aria-label="" id="viewMap" value="0" hidden>
        <div class="card">
          <div class="card-header">
            <h4 class="text-dark" id="titleMode">Peta Lamongan</h4>
            <div class="card-tools">
              <div class="col">
                <div class="form-group">
                <select class="form-control" id="select-pilih-peta">
                    <option>Pilih Data</option>
                    <option @if($riwayat=='Peta Riwayat') selected @endif data-url="{{route('histoty_map')}}">Peta Riwayat</option>
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
                  <div id="pd"><p>Legenda</p></div>
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
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<link rel="stylesheet" href=" {{ asset('dist/js/leaflet.ajax.min.js') }} ">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/leaflet.ajax.min.js') }}"></script>
<script src="{{ asset('js/kecamatan_json.js') }}"></script>
<script src="{{ asset('js/map.js') }}"></script>
<!-- /.content -->
<script>
    $(document).ready(function(){
        gantiPeta();
    })
    setTimeout(gantiPeta(), 1000);
</script>
    </body>
</html>