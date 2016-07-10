<?php namespace LexiSmith\LaravelRefer;

use Illuminate\Support\ServiceProvider;

class ReferralServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('laravel-refer', function() {
            return new Alchemy;
        });
    }
	
		public function boot()
		{
			require __DIR__.'/../../routes.php';
			
			$this->publishes([
      	__DIR__.'/config/refer.php' => config_path('refer.php'),
    	]);
			
		}
}