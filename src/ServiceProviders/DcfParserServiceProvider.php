<?php

namespace makowskid\DcfParser\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use makowskid\DcfParser\Facades\DcfParserFacade;
use makowskid\DcfParser\DcfParser;

/**
 * Class DcfParserServiceProvider
 *
 * @author  Dawid Makowski <dawid.makowski@gmail.com>
 */
class DcfParserServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the package.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
		$this->app->singleton('dcfparser', function ($app)
		{
			return new DcfParser();
		});
		
         $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('DcfParser', DcfParserFacade::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['dcfparser'];
    }


}
