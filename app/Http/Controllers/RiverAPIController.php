<?php

namespace App\Http\Controllers;
use App\River;
use App\District;
use Illuminate\Http\Request;

class RiverAPIController extends Controller
{
    public function index()
    {
        $sop = River::with('District')->orderBy('tanggal','desc')->limit(4)->get();
        $response = Response([ 'data' => $sop], 200);
        $response->header('Content-Type', 'application/json');
        return $response;
    }

}
