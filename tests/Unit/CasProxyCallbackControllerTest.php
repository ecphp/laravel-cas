<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelCas\Tests\Unit;

use EcPhp\LaravelCas\Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CasProxyCallbackControllerTest extends TestCase
{
    private $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = $this->get(route('laravel-cas-proxy-callback'));
    }

    public function testIfNotFalse()
    {
        self::assertNotFalse($this->response);
    }

    public function testIfXml()
    {
        self::assertEquals('', $this->response->getContent());
    }
}
