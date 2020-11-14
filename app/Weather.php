<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Weather extends Model
{
    protected $appends = [
        'weather_category',
    ];

    public function getWeatherCategoryAttribute()
    {
        $apiClient = new Client();
        $response = $apiClient->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=Lamongan, ID&units=metric&appid=b3d1241585bd607334169f4fa50a8767');
        $data = $response->getBody()->getContents();
        $decodedData = json_decode($data);

        if ($decodedData->weather[0]->main == 'Thunderstorm') {
            return 'Tinggi';
        }
        
        if ($decodedData->weather[0]->main == 'Rain') {
            return 'Sedang';
        } 
        
        if ($decodedData->weather[0]->main != 'Rain' || 'Thunderstorm') {
            return 'Rendah';
        }
    }
}
