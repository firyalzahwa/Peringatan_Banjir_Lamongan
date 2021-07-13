$criteria=[
        [
            'code'=>'C1',
            'name'=>'Penduduk',
            'value'=>1
        ],
        [
            'code'=>'C2',
            'name'=>'Waduk',
            'value'=>3
 
        ],
        [
            'code'=>'C3',
            'name'=>'Sungai',
            'value'=>5
 
        ],
        [
            'code'=>'C4',
            'name'=>'Tanah',
            'value'=>7
 
        ],
        [
            'code'=>'C5',
            'name'=>'Riwayat',
            'value'=>7
 
        ],
        [
            'code'=>'C6',
            'name'=>'Cuaca',
            'value'=>9
        ],
 
       
    ];
    //step 1
    $matrix=[];
    $loop=0;
    foreach($criteria as $key =>$item)
    {
      for($j=0;$j<count($criteria);$j++)
      {
        if($j<$loop)
        {
          $matrix[$key][$j]=0;
        }else{
          $matrix[$key][$j]=($key==0)?$criteria[$j]['value']:$criteria[$j-$loop]['value'];
 
        }
      }
      $loop++;
 
    }
    //step 2
    $pairWise=[];
    $totalAll=[];
    foreach($matrix as $j =>$v)
    {
      for($i=0;$i<count($matrix);$i++)
      {
        if($matrix[$j][$i]==0){
          $pairWise[$i][$j]=1/$matrix[$i][$j];
        }else{
          $pairWise[$i][$j]=$matrix[$j][$i];
        }
      }  
    }
    //step3
    $step=[];
    $decrement=5;
    for($i=0;$i<count($criteria);$i++)
    {
      for($j=0;$j<count($criteria);$j++)
      {
        $step[$i][$j]=$pairWise[$i][$j]/collect($pairWise)->sum($decrement);
 
      }
      $decrement--; 
    }
    //rata,bobot,cm,hasil akhir
    $resultAll=[];
    $averageAndBobot=[];
    $cm=[];
    foreach($criteria as $i =>$value)
    {
      $avg=[];
      $cm=[];
      for($j=0;$j<count($criteria);$j++)
      {
        $avg[]=$step[$j][$i];
      }
      $averageAndBobot[]=[
        'average'=>array_sum($avg)/count($avg),
        'bobot'=>(array_sum($avg)/count($avg))/count($criteria)
      ];
    }
 
    foreach($criteria as $i =>$value)
    {
      $total=0;
      for($j=0;$j<count($criteria);$j++)
      {
        $total+=$pairWise[$j][$i]*$averageAndBobot[$j]['bobot'];
      }
 
      $resultAll[]=[
        'code'=>$criteria[$i]['code'],
        'name'=>$criteria[$i]['name'],
        'matrik_1'=>$matrix,
        'matrik_2'=>$pairWise,
        'matrik_3'=>$step,
        'average'=>$averageAndBobot[$i]['average'],
        'bobot'=>$averageAndBobot[$i]['bobot'],
        'cm'=>$total,
        'total_result'=>$total/$averageAndBobot[$i]['bobot']
      ];
    }
    $data=DB::select("select 
    d.id, 
    d.title, 
    COALESCE(
      sum(p.total), 
      0
    ) as population,
    COALESCE(
        sum(re.total), 
        0
      ) as sum_of_reservoirs,  
    COALESCE(
      sum(r.jum_sungai), 
      0
    ) as sum_of_rivers, 
    COALESCE(
      sum(l.total), 
      0
    ) as sum_of_landheights, 
    COALESCE(
      sum(h.total), 
      0
    ) as sum_of_histories 
  from 
    districts d 
    left join village v on d.id = v.district_id 
    left join population p on p.village_id = v.id 
    left join rivers r on r.id_dist = d.id 
    left join landheights l on l.village_id = v.id 
    left join(
      select 
        count(*) as total, 
        h2.village_id 
      from 
        histories h2 
      GROUP by 
        h2.village_id
    ) as h on h.village_id = v.id 
    left join(
      select 
        count(*) as total, 
        r.village_id 
      from 
        reservoirs r 
      GROUP by 
        r.village_id
    ) as re on re.village_id = v.id 
  GROUP BY 
    d.id
  ");
  $result=[];
  foreach($data as $key =>$item)
  {
      $result[]=[
          'id'=>$item->id,
          'district_name'=>$item->title,
          'population'=>$item->population*$resultAll[0]['average'],
          'reservoirs'=>$item->sum_of_reservoirs*$resultAll[1]['average'],
          'rivers'=>$item->sum_of_rivers*$resultAll[2]['average'],
          'landheigts'=>$item->sum_of_landheights*$resultAll[3]['average'],
          'histories'=>$item->sum_of_histories*$resultAll[4]['average'],
          'total'=>$item->population*$resultAll[0]['average']+$item->sum_of_reservoirs*$resultAll[1]['average']
          +$item->sum_of_rivers*$resultAll[2]['average']+$item->sum_of_landheights*$resultAll[3]['average']+
          $item->sum_of_histories*$resultAll[4]['average']
      ];
  }
  $params=[
    'ahp'=>$resultAll,
    'data'=>$result
  ];
  dd($params);