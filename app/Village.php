<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Village extends Model
{
    public $timestamps = false;
    protected $table = 'village';

    protected $appends = [
        'history_category',
        // 'prone_category',
        'reservoir_average', 'reservoir_category',
        'population_category', 'population_value',
        'landheight_category', 'landheight_value',
        // 'river_category', 
        'river_value',
    ];

    // protected $hidden = [
    //     'reservoir_average', 'reservoir_category',
    //     'population_category', 'population_value',
    //     'landheight_category', 'landheight_value',
    //     'river_category', 'river_value',
    // ];

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function population()
    {
        return $this->hasMany('App\Population');
    }

    public function landheight()
    {
        return $this->hasMany('App\Landheight');
    }

    public function histories()
    {
        return $this->hasMany('App\History');
    }

    public function reservoirs()
    {
        return $this->hasMany('App\Reservoir');
    }

    //1. Parameter Riwayat Banjir
    public function getHistoryCategoryAttribute()
    {
        if ($this->histories->count() == 0) {
            return 'rendah';
        }

        if ($this->histories->count() == 1) {
            return 'sedang';
        }

        if ($this->histories->count() >= 2) {
            return 'tinggi';
        }
    }

    //2. Parameter Waduk
    public function getReservoirAverageAttribute()
    {
        $kapasitas = Reservoir::where(['village_id' => $this->id])->get();

        $kapasitas = $kapasitas->avg('kapasitas');

        return $kapasitas;
    }

    public function getReservoirCategoryAttribute()
    {
        if ($this->reservoir_average <= 27798) {
            return 'rendah';
        } else if ($this->reservoir_average > 27798) {
            return 'sedang';
        } else if ($this->reservoir_average >= 55596) {
            return 'tinggi';
        } else {
            return 'rendah';
        }
    }

    //4. Parameter Populasi
    public function getPopulationValueAttribute()
    {
        $population = Population::where(['village_id' => $this->id])->get();

        $population = $population->avg('total');

        return $population;
    }

    public function getPopulationCategoryAttribute()
    {
        if ($this->population_value >= 50 && $this->population_value < 20200) {
            return 'rendah';
        }

        if ($this->population_value >= 20200 && $this->population_value < 40350) {
            return 'sedang';
        }

        if ($this->population_value >= 40350) {
            return 'tinggi';
        }
    }

    //5. Parameter Tinggi Tanah
    public function getLandheightValueAttribute()
    {
        $landheight = Landheight::where(['village_id' => $this->id])->get();

        $landheight = $landheight->avg('total');

        return $landheight;
    }

    public function getLandheightCategoryAttribute()
    {
        if ($this->landheight_value < 25) {
            return 'rendah';
        }

        if ($this->landheight_value >= 25 && $this->landheight_value < 100) {
            return 'sedang';
        }

        if ($this->landheight_value >= 100) {
            return 'tinggi';
        }
    }

    //6. Parameter Tinggi Sungai
    public function getRiverValueAttribute()
    {
        // $river = River::where(['id_dist' => $this->id_dist])->get();

        // $getLatestUpdateDate = River::orderBy('tanggal', 'DESC')->first();

        // $rivers = River::where('tanggal', $getLatestUpdateDate->tanggal)->get();

        $rivers = River::where('id_dist')->get();

        $rivers = $rivers->avg('tinggi');

        return $rivers;
    }

    // public function getRiverCategoryAttribute()
    // {
    //     if ($this->district->title === 'Karangbinangun') {
    //         if ($this->river_value <= 2) return 'rendah';
    //         if ($this->river_value > 2 && $this->river_value <= 2.5) return 'sedang';
    //         if ($this->river_value >  2.5) return 'tinggi';
    //     } else if ($this->district->title === 'Babat') {
    //         if ($this->river_value <= 7.5) return 'rendah';
    //         if ($this->river_value > 7.5 && $this->river_value <= 8) return 'sedang';
    //         if ($this->river_value >  8) return 'tinggi';
    //     } else if ($this->district->title === 'Karanggeneng') {
    //         if ($this->river_value <= 4) return 'rendah';
    //         if ($this->river_value > 4.5 && $this->river_value <= 5) return 'sedang';
    //         if ($this->river_value > 5) return 'tinggi';
    //     } else if ($this->district->title === 'Laren') {
    //         if ($this->river_value <= 5) return 'rendah';
    //         if ($this->river_value > 5 && $this->river_value <= 5.5) return 'sedang';
    //         if ($this->river_value > 5.5) return 'tinggi';
    //     } else {
    //         return 'rendah';
    //     }
    // }

    //7. Parameter Cuaca
    public static function getWeather()
    {
        $apiClient = new Client();
        $response = $apiClient->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=Lamongan, ID&units=metric&appid=b3d1241585bd607334169f4fa50a8767');
        $data = $response->getBody()->getContents();
        $decodedData = json_decode($data);

        if ($decodedData->weather[0]->main == 'Thunderstorm' ) {
            $status_weather = 'tinggi';
        } else if ($decodedData->weather[0]->main == 'Rain' ) {
            $status_weather = 'rendah';
        } else if ($decodedData->weather[0]->main != 'Rain' || 'Thunderstorm') {
            $status_weather = 'sedang';
        } else {
            $status_weather = '';
        }

        return $status_weather;
    }

}
