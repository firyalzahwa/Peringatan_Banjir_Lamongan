<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\River;

class RiversController extends Controller
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
        $river = River::orderBy('id_dist','DESC')-> paginate(10);
        return view('admin.rivers.index', compact('river'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.river.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, River $river)
    {
        $river->id_dist = $request->id_dist;
        $river->kecamatan = $request->kecamatan;
        $river->jum_sungai = $request->jum_sungai;
        $river->save();
        return redirect()->route('admin.rivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_dist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(River $river)
    {
        $arr['river'] = $river;
        return view('admin.rivers.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, River $river)
    {
        $river->id_dist = $request->id_dist;
        $river->kecamatan = $request->kecamatan;
        $river->jum_sungai = $request->jum_sungai;
        $river->save();
        return redirect()->route('admin.rivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dist)
    {
        River::destroy($id_dist);
        return redirect()->route('admin.rivers.index');
    }
}
