# Laravel CAS Bundle

A CAS bundle for Laravel.

## Installation

```shell
    composer require ecphp/laravel-cas
```

`config/app.php`

```php
    'providers'       => [
        ...
        EcPhp\LaravelCas\Providers\AppServiceProvider::class,
    ],
```

`config/auth.php`

```php
    'guards'           => [
        ...
        'laravel-cas' => [
            'driver'   => 'laravel-cas',
            'provider' => 'laravel-cas',
        ],
    ],

    'providers'        => [
        ...
        'laravel-cas' => [
            'driver' => 'laravel-cas',
        ],
    ],
```

`app/Http/Kernel.php`

```php
    protected $middlewareGroups = [
        'web' => [
            ...
            \EcPhp\LaravelCas\Middleware\CasAuthenticator::class
        ],
        ...
    ];
```

`app/Providers/AppServiceProvider.php`

```php
    <?php

    declare(strict_types=1);

    use Illuminate\Contracts\Foundation\Application;
    use Psr\Http\Client\ClientInterface;
    use GuzzleHttp\Client;
    use loophp\psr17\Psr17Interface;
    use Nyholm\Psr7\Factory\Psr17Factory;
    use loophp\psr17\Psr17;

    public function register(): void
    {
        $this->app->bind(
            ClientInterface::class,
            function(Application $app): ClientInterface {
                //or whatever client you want
               return new Client();
            }
        );
        $this->app->bind(
            Psr17Interface::class,
            function(Application $app): Psr17Interface {
                $psr17Factory = new Psr17Factory();

                //or whatever psr17 you want
                return new Psr17(
                    $psr17Factory,
                    $psr17Factory,
                    $psr17Factory,
                    $psr17Factory,
                    $psr17Factory,
                    $psr17Factory
                );
            }
        );
    }
```

```shell
    php artisan vendor:publish --tag=laravel-cas
```
