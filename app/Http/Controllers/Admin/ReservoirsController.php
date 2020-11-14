<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Village;
use App\Reservoir;

class ReservoirsController extends Controller
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
        $reservoirs = Reservoir::orderBy('id','DESC')->paginate(10);
        return view('admin.reservoirs.index', compact('reservoirs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['villages'] = Village::all();
        return view('admin.reservoirs.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Reservoir $reservoir)
    {
        $reservoir->village_id = $request->village_id;
        $reservoir->title = $request->title;
        $reservoir->kapasitas = $request->kapasitas;
        $reservoir->save();
        return redirect()->route('admin.reservoirs.index');
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
    public function edit(Reservoir $reservoir)
    {
        $arr['reservoir'] = $reservoir;
        $arr['villages'] = Village::all();
        return view('admin.reservoirs.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $reservoir->village_id = $request->village_id;
        $reservoir->title = $request->title;
        $reservoir->kapasitas = $request->kapasitas;
        $reservoir->save();
        return redirect()->route('admin.reservoirs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservoir::destroy($id);
        return redirect()->route('admin.reservoirs.index');
    }
}
