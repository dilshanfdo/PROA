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
        $response = $this->getJson(route('weather-station.index'));
        $this->assertEquals(1, count($response->json()));
    }
}
