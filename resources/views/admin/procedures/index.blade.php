@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Halaman SOP</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">SOP</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid mt-7">
        {{-- <p>
            <a href="{{route('admin.procedures.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus-square mr-2"></i>Tambah Data</a> 
        </p> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow pb-3">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 mt-3 ml-2">Tabel SOP</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2 mr-2">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            {{ $data[0]->nama }}<i class="fas fa-chevron-circle-down" style="margin-left: 10px"></i>
                                        </a>
                                    </h5>
                                </div>
                                
                                <div id="collapseOne" class="collapse" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="card-block">
                                    @foreach($data[0]->detail_procedure as $item)
                                    <div class="card mb-n0">
                                        <div class="card-body">{{ $item->Tindakan }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    {{ $data[1]->nama }}<i class="fas fa-chevron-circle-down" style="margin-left: 10px"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel"
                        aria-labelledby="headingTwo">
                        <div class="card-block">
                            @foreach($data[1]->detail_procedure as $item)
                            <div class="card">
                                <div class="card-body">{{ $item->Tindakan }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            {{ $data[2]->nama }}<i class="fas fa-chevron-circle-down" style="margin-left: 10px"></i>
                        </a>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel"
                aria-labelledby="headingThree">
                <div class="card-block">
                    @foreach($data[2]->detail_procedure as $item)
                    <div class="card">
                        <div class="card-body">{{ $item->Tindakan }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection