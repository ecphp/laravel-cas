<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelCas\Tests\Providers;

use GuzzleHttp\Client;
use loophp\psr17\Psr17;
use loophp\psr17\Psr17Interface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Orchestra\Workbench\WorkbenchServiceProvider as ServiceProvider;
use Psr\Http\Client\ClientInterface;

final class LaravelCasProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientInterface::class, static function ($app, $params = []) {
            if (!empty($params) && isset($params['handler'])) {
                return new Client(['handler' => $params['handler']]);
            }

            return new Client();
        });
        $this->app->bind(Psr17Interface::class, static function ($app) {
            $requestFactory = $responseFactory = $streamFactory = $uploadedFileFactory = $uriFactory = $serverRequestFactory = new Psr17Factory();

            return new Psr17($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);
        });
    }
}
