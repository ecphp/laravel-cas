<?php

namespace EcPhp\LaravelCas\Tests;

use EcPhp\LaravelCas\Providers\AppServiceProvider;
// use EcPhp\LaravelEcas\Providers\LaravelEcasProvider;
use EcPhp\LaravelCas\Tests\Providers\LaravelCasProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Get application package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        $config = include \dirname(\dirname(__FILE__)) . '/src/publishers/config/laravel-cas.php';
        config(['laravel-cas' => $config]);

        return [
            AppServiceProvider::class,
            LaravelCasProvider::class,
            // LaravelEcasProvider::class,
        ];
    }
}
