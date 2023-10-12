<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelCas\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use EcPhp\CasLib\Contract\CasInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ProxyCallbackController extends Controller
{
    public function __invoke(
        Request $request,
        CasInterface $cas,
        ServerRequestInterface $serverRequest
    ): ResponseInterface|Response {
        return $cas
            ->handleProxyCallback(
                $serverRequest
                    ->withQueryParams(
                        $request->query->all()
                    )
            );
    }
}
