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

class CasProxyCallbackControllerTest extends TestCase
{
    private $uri = 'proxy';

    private $response;

    public function setUp(): void
    {
        parent::setUp();

        $this->response = $this->get(route('laravel-cas-proxy-callback'));
    }

    public function testIfNotFalse()
    {
        $this->assertNotFalse($this->response);
    }

    public function testIfXml()
    {
        $this->assertEquals('', $this->response->getContent());
    }
}
