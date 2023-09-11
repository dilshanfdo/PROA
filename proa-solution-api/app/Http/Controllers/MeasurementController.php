<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WeatherStation;
use App\Models\Variable;

class MeasurementController extends Controller
{
    /**
     * Get all latest weather information based on weather station
     */
    public function getRequiredInfo($id)
    {
        $dataTableName = 'data_'.$id;
        $latestWeatherInfo = [];

        $latestWeatherMeasurements = DB::table($dataTableName)->latest('timestamp')->first();
        // $variables = WeatherStation::find($id)->variable;
        $variables = Variable::where('id', '=', $id)->get();

        foreach($latestWeatherMeasurements as $key => $value){
            if($key == 'timestamp'){
                break;
            }
            foreach($variables as $var){
                if($var->name == $key){
                    $longName = str_replace('.', '', $var['long_name']);
                    $variableWeatherInfo = (object)array(
                        'name' => $key,
                        'long_name' => $longName,
                        'unit' => $var['unit'],
                        'value' => $value,
                        'timestamp' => $latestWeatherMeasurements->timestamp
                    );
                    break;
                }
                $variableWeatherInfo = (object)array(
                    'name' => $key,
                    'long_name' => $key,
                    'unit' => '',
                    'value' => $value,
                    'timestamp' => $latestWeatherMeasurements->timestamp
                );
            }
            array_push($latestWeatherInfo, $variableWeatherInfo);
        }

        return($latestWeatherInfo);
    }
}

