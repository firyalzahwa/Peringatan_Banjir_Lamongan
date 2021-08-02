<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\History;
use App\Village;
use Illuminate\Support\Facades\DB;
use App\Repository\RepositoryNaturalBreaks;

class HistoriesController extends Controller
{
    public function __construct(RepositoryNaturalBreaks $FNB)
    {
        $this->natural_breaks=$FNB;
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

    public function history_map()
    {
        $histories = DB::table('histories')->select('dist_id', DB::raw('SUM(kepala_keluarga) as kepala_keluarga'))->groupBy('dist_id')->where('dist_id', '>', 0)->get();
        $data = [];
        foreach($histories as $history){
            $data[$history->dist_id] = $history->kepala_keluarga;
        }
        // dd($data);
        sort($data);
        $breaks= $this->natural_breaks->getBreaks( $data, 3 );
        $cls = 1;
        $from = $data[ 0 ];
        $prices = array_unique( $data );
        sort( $prices );
        // dd($breaks);
        
        $data_compare = [];
         foreach( $prices as $i => $price ) {
             if( $price >= $breaks[ $cls ] ) {
                 $count = 0;
                 foreach( $data as $p ) {
                     if( $p >= $from && $p <= $price ) {
                         $count++;
                     }
                 }
                 $data_compare[] = [
                     'from' => $from,
                     'to' => $price
                 ];
                 if( isset( $prices[ $i + 1 ] ) ) {
                     $from = $prices[ $i + 1 ];
                 }
                 $cls++;
             }
         }
        //  dd($data);
        $res = [];
        foreach($histories as $history){
            $res[] = [
                'id' => $history->dist_id,
                'hasil' => $this->compare_fahp($data_compare, $data[($history->dist_id -1)], 0, count($data_compare))
            ];
        }
        return response()->json($res);
    }
    private function compare_fahp($data_compare, $fahp, $current, $end){
        if($current >= $end){
            return false;
        }
        if(($data_compare[$current]['from'] <= $fahp) && ($fahp <= $data_compare[$current]['to'])){
            return $current;
        }else{
            return $this->compare_fahp($data_compare, $fahp, $current +1 , $end);
        }
    }
}
