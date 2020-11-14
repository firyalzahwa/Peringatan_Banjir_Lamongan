<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;

class PetaAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }

    public function index(Request $request)
    {
        ini_set('max_execution_time', 0);

        if (is_null($request->desa)) {
            $flood = Village::all();
        } else {
            $flood = Village::where('title', 'like', '%' . ucfirst(strtolower($request->desa)) . '%')
                ->first();
        }
        
        $weather=Village::getWeather();
        foreach($flood as $key =>$item){
            $item->weather=$weather;
        }

        foreach ($flood as $key => $value) {
            $value['prone_category'] = $this-> getRawanBanjir ( $value['history_category'],
            $value['reservoir_category'],$value['population_category'],$value['landheight_category'],
            $value['river_category'], $weather);
        }

        // return response()->json($flood);

        $response = Response([ 'data' => $flood], 200);
        $response->header('Content-Type', 'application/json');
        return $response;
        
    }

    public function getRawanBanjir($history, $reservoir, $population, $landheight,  $river, $weather)
    {
        ini_set('max_execution_time', 0);

        if ($history == 'tinggi') {
            if ($weather == 'tinggi') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    }
                } 
            }
            else if ($weather == 'sedang') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    }
                } 
            }
            else if ($weather == 'rendah') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    }
                } 
            }
        } else if ($history == 'sedang') {
            if ($weather == 'tinggi') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    }
                } 
            }
            else if ($weather == 'sedang') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } 
            }
            else if ($weather == 'rendah') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } 
            }
        } else if ($history == 'rendah') {
            if ($weather == 'tinggi') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'tinggi';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } 
            }
            else if ($weather == 'sedang') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } 
            }
            else if ($weather == 'rendah') {
                if ($landheight == 'tinggi') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'sedang') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } else if ($landheight == 'rendah') {
                    if ($river == 'tinggi') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'tinggi';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'sedang') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'sedang';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    } else if ($river == 'rendah') {
                        if ($population == 'tinggi') {
                            if ($reservoir == 'tinggi') return 'sedang';
                            else if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'sedang') {
                            if ($reservoir == 'sedang') return 'sedang';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        } else if ($population == 'rendah') {
                            if ($reservoir == 'rendah') return 'rendah';
                            else if ($reservoir == 'sedang') return 'rendah';
                            else if ($reservoir == 'rendah') return 'rendah';
                        }
                    }
                } 
            }
        }
    }
}
