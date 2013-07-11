<?php namespace TomClarkson\LaravelGrunt; 

use Illuminate\Support\ServiceProvider;

class LaravelGruntServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['user.create'] = $this->app->share(function($app)
		{
			$creator = new UserCreator;
			return new UserCreatorCommand($creator);			
		});

		$this->commands('user.create');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}