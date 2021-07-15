<?php

namespace Sargilla\Firstdata;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class FirstdataServiceProvider extends ServiceProvider
{
	/**
     * Register services.
     *
     * @return void
     */
    public function register(){
        if (!defined('FIRSTDATA_PATH')) {
            define('FIRSTDATA_PATH', realpath(__DIR__.'/../'));
        }
        $this->app->singleton('firstdata', function () {
            return new Firstdata;
        });
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      	$this->publishes([FIRSTDATA_PATH.'/config/firstdata.php' => config_path('firstdata.php')],'firstdata');
    }
}
