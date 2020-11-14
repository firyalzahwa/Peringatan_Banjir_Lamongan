<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Village;
use App\Population;

class PopulationsController extends Controller
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
        $populations = Population::orderBy('id','DESC')->paginate(10);
        return view('admin.populations.index', compact('populations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['villages'] = Village::all();
        return view('admin.populations.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Population $population)
    {
        $population->village_id = $request->village_id;
        $population->total = $request->total;
        $population->save();
        return redirect()->route('admin.populations.index');
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
    public function edit(Population $population)
    {
        $arr['population'] = $population;
        $arr['villages'] = Village::all();
        return view('admin.populations.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Population $population)
    {
        $population->village_id = $request->village_id;
        $population->total = $request->total;
        $population->save();
        return redirect()->route('admin.populations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Population::destroy($id);
        return redirect()->route('admin.populations.index');
    }
}
