<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\History;
use App\Village;

class HistoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = History::orderBy('id','DESC')->paginate(10);
        return view('admin.histories.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['villages'] = Village::all();
        return view('admin.histories.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, History $history)
    {
        $history->village_id = $request->village_id;
        $history->tanggal = $request->tanggal;
        $history->kepala_keluarga = $request->kepala_keluarga;
        $history->jiwa = $request->jiwa;
        $history->rumah = $request->rumah;
        $history->sekolah = $request->sekolah;
        $history->kantor_desa = $request->kantor_desa;
        $history->sawah = $request->sawah;
        $history->jalan = $request->jalan;
        $history->save();
        return redirect()->route('admin.histories.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = \App\History::findOrFail($id);
        $map = \App\History::limit(10)->get();

        return view('admin.histories.show', ['history' => $history], ['map' => $map]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        $arr['history'] = $history;
        $arr['villages'] = Village::all();
        return view('admin.histories.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        $history->village_id = $request->village_id;
        $history->tanggal = $request->tanggal;
        $history->kepala_keluarga = $request->kepala_keluarga;
        $history->jiwa = $request->jiwa;
        $history->rumah = $request->rumah;
        $history->sekolah = $request->sekolah;
        $history->kantor_desa = $request->kantor_desa;
        $history->sawah = $request->sawah;
        $history->jalan = $request->jalan;
        $history->save();
        return redirect()->route('admin.histories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        History::destroy($id);
        return redirect()->route('admin.histories.index');
    }
}
