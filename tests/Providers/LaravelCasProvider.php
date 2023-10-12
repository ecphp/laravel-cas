<?php

namespace EcPhp\LaravelCas\Tests\Providers;

use GuzzleHttp\Client;
// use Illuminate\Support\ServiceProvider;
use loophp\psr17\Psr17;
use loophp\psr17\Psr17Interface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Orchestra\Workbench\WorkbenchServiceProvider as ServiceProvider;
use Psr\Http\Client\ClientInterface;

class LaravelCasProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
        $this->app->bind(ClientInterface::class, function ($app, $params = [])
        {
            if (!empty($params) && isset($params['handler']))
            {
                return new Client(['handler'=>$params['handler']]);
            }

            return new Client();
        });
        $this->app->bind(Psr17Interface::class, function ($app)
        {
            $requestFactory = $responseFactory = $streamFactory = $uploadedFileFactory = $uriFactory = $serverRequestFactory = new Psr17Factory();

            return new Psr17($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
    }
}
