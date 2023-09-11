<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\WeatherStation;

class WeatherStationController extends Controller
{
    /**
     * Fetch list of weather stations based on the state
     */
    public function index($state)
    {
        if($state == 'All'){
            $list = WeatherStation::all();
        }
        else {
            $list = WeatherStation::where('state', '=', $state)->get();
        }

        return response($list);
    }
}
