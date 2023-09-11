<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\WeatherStation;

class WeatherStationTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_all_weather_stations(): void
    {
        $this->withoutExceptionHandling();
        WeatherStation::create([
            'name' => 'Cohuna North',
            'site' => 'Cohuna Solar Farm',
            'portfolio' => 'Enel Green Power',
            'state' => 'VIC',
            'latitude' => '-35.882762',
            'longitude' => '144.217208'
        ]);
        $response = $this->getJson(route('weather-station.index', 'All'));
        $this->assertEquals(1, count($response->json()));
    }

    public function test_fetch_all_weather_stations_belong_to_a_state(): void
    {
        $this->withoutExceptionHandling();
        WeatherStation::create([
            'name' => 'Cohuna North',
            'site' => 'Cohuna Solar Farm',
            'portfolio' => 'Enel Green Power',
            'state' => 'VIC',
            'latitude' => '-35.882762',
            'longitude' => '144.217208'
        ], [
            'name' => 'Bungala 1 West',
            'site' => 'Bungala 1 Solar Farm',
            'portfolio' => 'Enel Green Power',
            'state' => 'SA',
            'latitude' => '-32.430536',
            'longitude' => '137.846245'
        ]);
        $response = $this->getJson(route('weather-station.index', 'VIC'));
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('Cohuna North', $response[0]['name']);
    }
}
