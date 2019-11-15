<?php

namespace makowskid\DcfParser\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use makowskid\DcfParser\Contracts\DcfParserInterface;
use makowskid\DcfParser\Facades\DcfParserFacadeAccessor;
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
        /*
        |--------------------------------------------------------------------------
        | Implementation Bindings
        |--------------------------------------------------------------------------
        */
        $this->implementationBindings();

        /*
        |--------------------------------------------------------------------------
        | Facade Bindings
        |--------------------------------------------------------------------------
        */
        $this->facadeBindings();

        /*
        |--------------------------------------------------------------------------
        | Registering Service Providers
        |--------------------------------------------------------------------------
        */
        $this->serviceProviders();
    }

    /**
     * Implementation Bindings
     */
    private function implementationBindings()
    {
        $this->app->bind(
            DcfParserInterface::class,
            DcfParser::class
        );
    }

    /**
     * Facades Binding
     */
    private function facadeBindings()
    {
        // Register 'DcfParser' Alias, So users don't have to add the Alias to the 'app/config/app.php'
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('DcfParser', DcfParserFacadeAccessor::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Registering Other Custom Service Providers (if you have)
     */
    private function serviceProviders()
    {
        // $this->app->register('...\...\...');
    }

}
