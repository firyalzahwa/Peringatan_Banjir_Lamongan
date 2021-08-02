<?php

public function fahp()
    {
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
        //matrik l,m,n
        $pairWise=[];
        for ($i=0; $i < count($criteria) ; $i++) {
            for ($j=0; $j < count($criteria); $j++) {
                if($matrix[$i][$j]==0)
                {
                    if($matrix[$j][$i]==1)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>1,
                            'm'=>1,
                            'n'=>1,
                        ]; 
                    }
 
                    if($matrix[$j][$i]==3)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>1/2,
                            'm'=>2/3,
                            'n'=>1,
                        ]; 
                    }
 
                    if($matrix[$j][$i]==5)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>1/3,
                            'm'=>2/5,
                            'n'=>1/2,
                        ]; 
                    }
 
                    if($matrix[$j][$i]==7)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>1/4,
                            'm'=>2/7,
                            'n'=>1/3,
                        ]; 
                    }
 
                    if($matrix[$j][$i]==9)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>2/9,
                            'm'=>2/9,
                            'n'=>1/4,
                        ]; 
                    }
                    
                }else{
                    if($matrix[$i][$j]==1)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>1,
                            'm'=>1,
                            'n'=>1,
                        ];
                    }
                    if($matrix[$i][$j]==3)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>1,
                            'm'=>3/2,
                            'n'=>2,
                        ];
                    }
 
                    if($matrix[$i][$j]==5)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>2,
                            'm'=>5/2,
                            'n'=>3,
                        ];
                    }
 
                    if($matrix[$i][$j]==7)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>3,
                            'm'=>7/2,
                            'n'=>4,
                        ];
                    }
                    if($matrix[$i][$j]==9)
                    {
                        $pairWise[$i][$j]=[
                            'l'=>4,
                            'm'=>9/2,
                            'n'=>9/2,
                        ];
                    }
                    
                }
              
            }
        }
 
        //fuzzy triangular number
        $fzn=[];
        $lTotal=0;
        $mTotal=0;
        $nTotal=0;
        for($i=0;$i<count($criteria);$i++)
        {
            $l=0;
            $m=0;
            $n=0;
            for($j=0;$j<count($criteria);$j++)
            {
                $l+=$pairWise[$i][$j]['l'];
                $m+=$pairWise[$i][$j]['m'];
                $n+=$pairWise[$i][$j]['n'];
            }
            $fzn[]=[
                'code'=>$criteria[$i]['code'],
                'l'=>$l,
                'm'=>$m,
                'u'=>$n
            ];   
            $lTotal+=$l;
            $mTotal+=$m;
            $nTotal+=$n;
        }
        $fznSintethic=[];
        foreach($fzn as $v =>$n)
        {
            $fznSintethic[]=[
                'code'=>$fzn[$v]['code'],
                'l'=>round($fzn[$v]['l']/$nTotal,3),
                'm'=>round($fzn[$v]['m']/$mTotal,3),
                'u'=>round($fzn[$v]['u']/$lTotal,3),
                'total'=>round($fzn[$v]['l']/$nTotal+$fzn[$v]['m']/$mTotal+$fzn[$v]['u']/$lTotal,3)
            ];
        }
        
        dd($fznSintethic);
        dd($lTotal);
        dd($fzn);
 
    }