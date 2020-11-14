<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Village;
use App\Landheight;

class LandheightsController extends Controller
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
        $landheights = Landheight::orderBy('id','DESC')->paginate(10);
        return view('admin.landheights.index', compact('landheights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['villages'] = Village::all();
        return view('admin.landheights.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Landheight $landheight)
    {
        $landheight->village_id = $request->village_id;
        $landheight->total = $request->total;
        $landheight->save();
        return redirect()->route('admin.landheights.index');
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
    public function edit(Landheight $landheight)
    {
        $arr['landheight'] = $landheight;
        $arr['villages'] = Village::all();
        return view('admin.landheights.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landheight $landheight)
    {
        $landheight->village_id = $request->village_id;
        $landheight->total = $request->total;
        $landheight->save();
        return redirect()->route('admin.landheights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Landheight::destroy($id);
        return redirect()->route('admin.landheights.index');
    }
}
