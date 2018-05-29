<?php

namespace App\Providers;

use App\Services\Weather\Endpoints\OpenWeather as OpenWeatherEndpoint;
use App\Services\Weather\Formatter\DefaultFormat;
use App\Services\Weather\Parsers\OpenWeather as OpenWeatherParser;
use App\Services\Weather\Worker;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    $this->app->singleton('WeatherWorker', function ($app) {
		    $endpoint = new OpenWeatherEndpoint;
		    $parser = new OpenWeatherParser;
		    $formatter = new DefaultFormat;

		    return new Worker($endpoint, $parser, $formatter);
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
