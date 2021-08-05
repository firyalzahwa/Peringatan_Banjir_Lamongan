<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use Illuminate\Support\Facades\DB;
use App\Repository\RepositoryNaturalBreaks;

class AHPController extends Controller
{
    public function __construct(RepositoryNaturalBreaks $FNB)
    {
      $this->middleware('cors');
      $this->natural_breaks=$FNB;
    }
    public function perhitunganAHP(){
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
        //step 1
        // $matrix=[];
        // $loop=0;
        // foreach($criteria as $key =>$item)
        // {
        //   for($j=0;$j<count($criteria);$j++)
        //   {
        //     if($j<$loop)
        //     {
        //       $matrix[$key][$j]=0;
        //     }else{
        //       $matrix[$key][$j]=($key==0)?$criteria[$j]['value']:$criteria[$j-$loop]['value'];
     
        //     }
        //   }
        //   $loop++;
     
        // }
        //step 2
        // $pairWise=[];
        // $totalAll=[];
        // foreach($matrix as $j =>$v)
        // {
        //   for($i=0;$i<count($matrix);$i++)
        //   {
        //     if($matrix[$j][$i]==0){
        //       $pairWise[$i][$j]=1/$matrix[$i][$j];
        //     }else{
        //       $pairWise[$i][$j]=$matrix[$j][$i];
        //     }
        //   }  
        // }
        //step3
        // $step=[];
        // $decrement=5;
        // for($i=0;$i<count($criteria);$i++)
        // {
        //   for($j=0;$j<count($criteria);$j++)
        //   {
        //     $step[$i][$j]=$pairWise[$i][$j]/collect($pairWise)->sum($decrement);
     
        //   }
        //   $decrement--; 
        // }
        //rata,bobot,cm,hasil akhir
      //   $resultAll=[];
      //   $averageAndBobot=[];
      //   $cm=[];
      //   foreach($criteria as $i =>$value)
      //   {
      //     $avg=[];
      //     $cm=[];
      //     for($j=0;$j<count($criteria);$j++)
      //     {
      //       $avg[]=$step[$j][$i];
      //     }
      //     $averageAndBobot[]=[
      //       'average'=>array_sum($avg)/count($avg),
      //       'bobot'=>(array_sum($avg)/count($avg))/count($criteria)
      //     ];
      //   }
     
      //   foreach($criteria as $i =>$value)
      //   {
      //     $total=0;
      //     for($j=0;$j<count($criteria);$j++)
      //     {
      //       $total+=$pairWise[$j][$i]*$averageAndBobot[$j]['bobot'];
      //     }
        
      //     $resultAll[]=[
      //       'code'=>$criteria[$i]['code'],
      //       'name'=>$criteria[$i]['name'],
      //       'matrik_1'=>$matrix,
      //       'matrik_2'=>$pairWise,
      //       'matrik_3'=>$step,
      //       'average'=>$averageAndBobot[$i]['average'],
      //       'bobot'=>$averageAndBobot[$i]['bobot'],
      //       'cm'=>$total,
      //       'total_result'=>$total/$averageAndBobot[$i]['bobot']
      //     ];
      //   }
      //   $data=DB::select("select 
      //   d.id, 
      //   d.title, 
      //   COALESCE(
      //     sum(p.total), 
      //     0
      //   ) as populations,
      //   COALESCE(
      //       sum(re.total), 
      //       0
      //     ) as sum_of_reservoirs,  
      //   COALESCE(
      //     sum(r.jum_sungai), 
      //     0
      //   ) as sum_of_rivers, 
      //   COALESCE(
      //     sum(l.total), 
      //     0
      //   ) as sum_of_landheights, 
      //   COALESCE(
      //     sum(h.total), 
      //     0
      //   ) as sum_of_histories 
      // from 
      //   districts d 
      //   left join village v on d.id = v.district_id 
      //   left join populations p on p.village_id = v.id 
      //   left join rivers r on r.id_dist = d.id 
      //   left join landheights l on l.village_id = v.id 
      //   left join(
      //     select 
      //       count(*) as total, 
      //       h2.village_id 
      //     from 
      //       histories h2 
      //     GROUP by 
      //       h2.village_id
      //   ) as h on h.village_id = v.id 
      //   left join(
      //     select 
      //       count(*) as total, 
      //       r.village_id 
      //     from 
      //       reservoirs r 
      //     GROUP by 
      //       r.village_id
      //   ) as re on re.village_id = v.id 
      // GROUP BY 
      //   d.id, d.title
      // ");
      // $data=[];
      // foreach($data as $key =>$item)
      // {
      //   $id = (int)$item->id;
      //   $district_name = $item->title;
      //   $populations = $item->populations*$resultAll[0]['average'];
      //   $reservoirs = $item->sum_of_reservoirs*$resultAll[1]['average'];
      //   $rivers = $item->sum_of_rivers*$resultAll[2]['average'];
      //   $landheights = $item->sum_of_landheights*$resultAll[3]['average'];
      //   $histories = $item->sum_of_histories*$resultAll[4]['average'];
      //   $total = $item->populations*$resultAll[0]['average']+$item->sum_of_reservoirs*$resultAll[1]['average'];
      //         +$item->sum_of_rivers*$resultAll[2]['average']+$item->sum_of_landheights*$resultAll[3]['average']+
      //         $item->sum_of_histories*$resultAll[4]['average'];
        
      //   $data[$id]=(int)$total;

          // Insert Results to AHP table
          // DB::table('AHP')->insert([
          //   'id'=>$id,
          //   'district_name'=>$district_name,
          //   'populations'=>$populations,
          //   'reservoirs'=>$reservoirs,
          //   'rivers'=>$rivers,
          //   'landheights'=>$landheights,
          //   'histories'=>$histories,
          //   'total'=> $total
          // ]);
      // }
      
      // $params=[
      //   'ahp'=>$resultAll,
      //   'data'=>$result
      // ];
      // dd($result);
      $data_ahp_temp = DB::table('ahp')->select('id', 'total')->get();
      $data = [];
      foreach($data_ahp_temp as $ahp){
        $data[$ahp->id] = $ahp->total;
      }
      
      // dd($data);
      sort($data);
      $breaks= $this->natural_breaks->getBreaks( $data, 3 );
      dd($breaks);
      $cls = 1;
      $from = $data[ 0 ];
      $prices = array_unique( $data );
      sort( $prices );
      dd($breaks);
      
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
      foreach($data_ahp_temp as $ahp){
          $res[] = [
              'id' => $ahp->id,
              'hasil' => $this->compare_fahp($data_compare, $data[($ahp->id -1)], 0, count($data_compare))
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

