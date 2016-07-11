<?php namespace LexiSmith\LaravelRefer;

use Illuminate\Support\ServiceProvider;

class ReferralServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('laravel-refer', function() {
            return new Referral;
        });
    }
	
		public function boot()
		{			
			if (! $this->app->routesAreCached()) {
				require __DIR__.'/routes.php';
			}
			
			$this->publishes([
      	__DIR__.'/config/refer.php' => config_path('refer.php'),
    	]);
			
			$this->publishes([
        __DIR__.'/database/migrations/' => database_path('migrations')
			], 'migrations');
			
			$this->loadViewsFrom(__DIR__.'/views', 'referral');

		}
}
