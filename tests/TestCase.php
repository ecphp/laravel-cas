<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelCas\Tests;

use EcPhp\LaravelCas\Providers\AppServiceProvider;
use EcPhp\LaravelCas\Tests\Providers\LaravelCasProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

use function dirname;

/**
 * @internal
 */
abstract class TestCase extends OrchestraTestCase
{
    /**
     * Get application package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        $config = include dirname(__DIR__) . '/src/publishers/config/laravel-cas.php';
        config(['laravel-cas' => $config]);

        return [
            AppServiceProvider::class,
            LaravelCasProvider::class,
        ];
    }
}
