<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\Village;

class VillagesController extends Controller
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

        $villages = Village::orderBy('id','DESC')->paginate(10);
        return view('admin.villages.index', compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['districts'] = District::all();
        return view('admin.villages.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Village $village)
    {
        $village->title = $request->title;
        $village->district_id = $request->district_id;
        $village->long_villages = $request->long_villages;
        $village->lat_villages = $request->lat_villages;
        $village->save();
        return redirect()->route('admin.villages.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        $arr['village'] = $village;
        $arr['districts'] = District::all();
        return view('admin.villages.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        $village->title = $request->title;
        $village->district_id = $request->district_id;
        $village->long_villages = $request->long_villages;
        $village->lat_villages = $request->lat_villages;
        $village->save();
        return redirect()->route('admin.villages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Village::destroy($id);
        return redirect()->route('admin.villages.index');
    }
}
