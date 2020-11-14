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
        $rivers = River::orderBy('id','DESC')->paginate(10);
        return view('admin.rivers.index', compact('rivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['districts'] = District::whereIn('id',[1,7,8,12])->get();
        return view('admin.rivers.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, River $river)
    {
        $river->district_id = $request->district_id;
        $river->tanggal = $request->tanggal;
        $river->tinggi = $request->tinggi;
        $river->save();
        return redirect()->route('admin.rivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $arr['districts'] = District::whereIn('id',[1,7,8,12])->get();
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
        $river->district_id = $request->district_id;
        $river->tanggal = $request->tanggal;
        $river->tinggi = $request->tinggi;
        $river->save();
        return redirect()->route('admin.rivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        River::destroy($id);
        return redirect()->route('admin.rivers.index');
    }
}
