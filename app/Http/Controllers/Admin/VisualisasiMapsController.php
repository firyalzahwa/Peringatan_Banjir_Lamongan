<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Village;

class VisualisasiMapController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }
    public function perhitunganAHP(){
        var penduduk, waduk, sungai, tanah, riwayat, cuaca;
        
    }
}
