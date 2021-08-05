<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Repository\RepositoryNaturalBreaks;

class FAhpController extends Controller {
    public function __construct(RepositoryNaturalBreaks $FNB)
    {
        $this->natural_breaks=$FNB;
        
    }

    public function fahp() {
        // $criteria=[
        //     [
        //         'code'=>'C1',
        //         'name'=>'Penduduk',
        //         'value'=>1
        //     ],
        //     [
        //         'code'=>'C2',
        //         'name'=>'Waduk',
        //         'value'=>3
        
        //     ],
        //     [
        //         'code'=>'C3',
        //         'name'=>'Sungai',
        //         'value'=>5
        
        //     ],
        //     [
        //         'code'=>'C4',
        //         'name'=>'Tanah',
        //         'value'=>7
        
        //     ],
        //     [
        //         'code'=>'C5',
        //         'name'=>'Riwayat',
        //         'value'=>7
        
        //     ],
        //     [
        //         'code'=>'C6',
        //         'name'=>'Cuaca',
        //         'value'=>9
        //     ],
        
            
        // ];
        // //step 1
        // $matrix=[];
        // $loop=0;
        // foreach($criteria as $key =>$item)
        // {
        //     for($j=0;$j<count($criteria);$j++)
        //     {
        //     if($j<$loop)
        //     {
        //         $matrix[$key][$j]=0;
        //     }else{
        //         $matrix[$key][$j]=($key==0)?$criteria[$j]['value']:$criteria[$j-$loop]['value'];
        
        //     }
        //     }
        //     $loop++;
        
        // }
        // //matrik l,m,n
        // $pairWise=[];
        // for ($i=0; $i < count($criteria) ; $i++) {
        //     for ($j=0; $j < count($criteria); $j++) {
        //         if($matrix[$i][$j]==0)
        //         {
        //             if($matrix[$j][$i]==1)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>1,
        //                     'm'=>1,
        //                     'n'=>1,
        //                 ]; 
        //             }
    
        //             if($matrix[$j][$i]==3)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>1/2,
        //                     'm'=>2/3,
        //                     'n'=>1,
        //                 ]; 
        //             }
    
        //             if($matrix[$j][$i]==5)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>1/3,
        //                     'm'=>2/5,
        //                     'n'=>1/2,
        //                 ]; 
        //             }
    
        //             if($matrix[$j][$i]==7)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>1/4,
        //                     'm'=>2/7,
        //                     'n'=>1/3,
        //                 ]; 
        //             }
    
        //             if($matrix[$j][$i]==9)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>2/9,
        //                     'm'=>2/9,
        //                     'n'=>1/4,
        //                 ]; 
        //             }
                    
        //         }else{
        //             if($matrix[$i][$j]==1)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>1,
        //                     'm'=>1,
        //                     'n'=>1,
        //                 ];
        //             }
        //             if($matrix[$i][$j]==3)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>1,
        //                     'm'=>3/2,
        //                     'n'=>2,
        //                 ];
        //             }
    
        //             if($matrix[$i][$j]==5)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>2,
        //                     'm'=>5/2,
        //                     'n'=>3,
        //                 ];
        //             }
    
        //             if($matrix[$i][$j]==7)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>3,
        //                     'm'=>7/2,
        //                     'n'=>4,
        //                 ];
        //             }
        //             if($matrix[$i][$j]==9)
        //             {
        //                 $pairWise[$i][$j]=[
        //                     'l'=>4,
        //                     'm'=>9/2,
        //                     'n'=>9/2,
        //                 ];
        //             }
                    
        //         }
                
        //     }
        // }
    
        // //fuzzy triangular number
        // $fzn=[];
        // $lTotal=0;
        // $mTotal=0;
        // $nTotal=0;
        // for($i=0;$i<count($criteria);$i++)
        // {
        //     $l=0;
        //     $m=0;
        //     $n=0;
        //     for($j=0;$j<count($criteria);$j++)
        //     {
        //         $l+=$pairWise[$i][$j]['l'];
        //         $m+=$pairWise[$i][$j]['m'];
        //         $n+=$pairWise[$i][$j]['n'];
        //     }
        //     $fzn[]=[
        //         'code'=>$criteria[$i]['code'],
        //         'l'=>$l,
        //         'm'=>$m,
        //         'u'=>$n
        //     ];   
        //     $lTotal+=$l;
        //     $mTotal+=$m;
        //     $nTotal+=$n;
        // }
        // $fznSintethic=[];
        // foreach($fzn as $v =>$n)
        // {
        //     $fznSintethic[]=[
        //         'code'=>$fzn[$v]['code'],
        //         'l'=>round($fzn[$v]['l']/$nTotal,3),
        //         'm'=>round($fzn[$v]['m']/$mTotal,3),
        //         'u'=>round($fzn[$v]['u']/$lTotal,3),
        //         'total'=>round($fzn[$v]['l']/$nTotal+$fzn[$v]['m']/$mTotal+$fzn[$v]['u']/$lTotal,3)
        //     ];
        // }
        
        // $lmnTotal = [
        //     'lTotal' => $lTotal,
        //     'mTotal' => $mTotal,
        //     'nTotal' => $nTotal,
        // ];

        // //perbandingan kriteria
        // $perbandinganKriteria = [];
        // for ($i = 0; $i < count($fznSintethic); $i++) {
        //     for ($j = 0; $j < count($fznSintethic); $j++) {
        //         if ($i == $j) {
        //             $perbandinganKriteria[$i][$j] = [
        //                 "baris" => $fznSintethic[$i]["code"],
        //                 "kolom" => $fznSintethic[$j]["code"],
        //                 "value" => 99999
        //             ];
        //         } else {
        //             if ($fznSintethic[$i]["m"] >= $fznSintethic[$j]["m"]) {
        //                 $perbandinganKriteria[$i][$j] = [
        //                     "baris" => $fznSintethic[$i]["code"],
        //                     "kolom" => $fznSintethic[$j]["code"],
        //                     "value" => 1
        //                 ];
        //             } else if ($fznSintethic[$j]["l"] >= $fznSintethic[$i]["u"]) {
        //                 $perbandinganKriteria[$i][$j] = [
        //                     "baris" => $fznSintethic[$i]["code"],
        //                     "kolom" => $fznSintethic[$j]["code"],
        //                     "value" => 0,
        //                 ];
        //             } else {
        //                 $perbandinganKriteria[$i][$j] =  [
        //                     "baris" => $fznSintethic[$i]["code"],
        //                     "kolom" => $fznSintethic[$j]["code"],
        //                     "value" => ($fznSintethic[$j]["l"] - $fznSintethic[$i]["u"]) / ($fznSintethic[$i]["m"] - $fznSintethic[$i]["u"]) - ($fznSintethic[$j]["m"] - $fznSintethic[$j]["l"])
        //                 ];
        //             }
                    
        //         }
                
        //     }
        // }
        // for ($i = 0; $i < count($fznSintethic); $i++) {
        //     for ($j = 0; $j < count($fznSintethic); $j++) {
        //         if ($i == $j) {
        //             unset($perbandinganKriteria[$i][$j]);
        //         }
        //     }
        // }
                   
        // //Normalisasi Bobot Vektor
        // $bobot = [];
        // $total_wy = 0;
        // $wy = [] ;
        // $w = [] ;
        
        // for ($i = 0; $i < count($perbandinganKriteria); $i++) {
        //     $min = 999999;
        //     for ($j = 0; $j < count($perbandinganKriteria); $j++) {
        //         if ($i != $j) {
        //             if ($perbandinganKriteria[$i][$j]["value"] < $min) {
        //                 $min = $perbandinganKriteria[$i][$j]["value"];
        //             }
        //         }
        //     }
        //     $wy[$i] = $min;
        //     $total_wy += $min;
        // }

        // for ($x = 0; $x < count($wy); $x++) {
        //     $w[$x] = $wy[$x] / $total_wy;
        // }

        // $normalisasiBobotVektor = [];
        // for ($x = 0; $x < count($wy); $x++) {
        //     $normalisasiBobotVektor[$x]["wy"] = $wy[$x];
        //     $normalisasiBobotVektor[$x]["w"] = $w[$x];
        // }
        // $disttrict = DB::table('districts')->where('id', '>', 0)->get();

        // $population = DB::table('populations')->select('dist_id', DB::raw('SUM(total) as total'))->groupBy('dist_id')->where('dist_id', '>', 0)->get();
        // $data_population = [];
        // foreach($population as $populate){
        //     $data_population[$populate->dist_id] = $populate->total *$normalisasiBobotVektor[0]['w'];
        // }

        // $reservoirs = DB::table('reservoirs')->select('dist_id', DB::raw('SUM(kapasitas) as kapasitas'))->groupBy('dist_id')->where('dist_id', '>', 0)->get();
        // $data_reservoirs = [];
        // foreach($reservoirs as $reservoir){
        //     $data_reservoirs[$reservoir->dist_id] = $reservoir->kapasitas *$normalisasiBobotVektor[1]['w'];
        // }

        // $rivers = DB::table('rivers')->select('id_dist', 'jum_sungai')->where('id_dist', '>', 0)->get();
        // $data_rivers = [];
        // foreach($rivers as $river){
        //     $data_rivers[$river->id_dist] = $river->jum_sungai * $normalisasiBobotVektor[2]['w'];
        // }

        // $landheights = DB::table('landheights')->select('dist_id', DB::raw('SUM(total) as total'))->groupBy('dist_id')->where('dist_id', '>', 0)->get();
        // $data_landheights = [];
        // foreach($landheights as $landheight){
        //     $data_landheights[$landheight->dist_id] = $landheight->total *$normalisasiBobotVektor[3]['w'];
        // }

        // $histories = DB::table('histories')->select('dist_id', DB::raw('SUM(kepala_keluarga) as kepala_keluarga'))->groupBy('dist_id')->where('dist_id', '>', 0)->get();
        // $data_histories = [];
        // foreach($histories as $history){
        //     $data_histories[$history->dist_id] = $history->kepala_keluarga *$normalisasiBobotVektor[4]['w'];
        // }

        // $apiClient = new Client();
        // $response = $apiClient->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=Lamongan, ID&units=metric&appid=b3d1241585bd607334169f4fa50a8767');
        // $statusCode = $response->getStatusCode();
        // $data = $response->getBody()->getContents();
        // $decodedData = json_decode($data);


        // $data = [] ;
        // foreach($disttrict as $dist){
        //     $populate = $data_population[$dist->id] ?? 0;
        //     $reservoir = $data_reservoirs[$dist->id] ?? 0;
        //     $river = $data_rivers[$dist->id] ?? 0;
        //     $landheight = $data_landheights[$dist->id] ?? 0;
        //     $history = $data_histories[$dist->id] ?? 0;
        //     $weather = $decodedData->main->temp * $normalisasiBobotVektor[5]['w'];
        //     $data[($dist->id -1)] = (int)($populate + $reservoir + $river + $landheight + $history + $weather);

            // Insert Results to fahp table
            // DB::table('FAHP')->insert([
            //     'dist_id'=>$dist->id,
            //     'populations'=>$populate,
            //     'reservoirs'=>$reservoir,
            //     'rivers'=>$river,
            //     'landheights'=>$landheight,
            //     'histories'=>$history,
            //     'weather'=>$weather,
            //     'total'=> $data[($dist->id -1)]
            // ]);
        // }
        $data_fahp_temp = DB::table('fahp')->select('dist_id', 'total')->get();
        $data = [];
        foreach($data_fahp_temp as $fahp){
        $data[$fahp->dist_id] = $fahp->total;
        }

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
         $res = [];
         foreach($data_fahp_temp as $fahp){
             $res[] = [
                 'id' => $fahp->dist_id,
                 'hasil' => $this->compare_fahp($data_compare, $data[($fahp->dist_id -1)], 0, count($data_compare))
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
    

    public function get_json()
    {
        $apiClient = new Client();
        $response = $apiClient->request('GET', 'https://gevalinda.github.io/desa_lamongan/kecamatan.json');
        $statusCode = $response->getStatusCode();
        $data = $response->getBody()->getContents();    
        return $data;    
    }
}
