<?php

namespace Bildvitta\IssProduto;

use Bildvitta\IssProduto\Contracts\IssProdutoFactory;
use Bildvitta\IssProduto\Resources\RealStateDevelopmentResource;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

/**
 * Class IssProduto.
 *
 * @package Bildvitta\IssProduto
 */
class IssProduto extends HttpClient implements IssProdutoFactory
{
    /**
     * @var PendingRequest
     */
    public PendingRequest $request;

    /**
     * @var string
     */
    private string $token;

    /**
     * Hub constructor.
     *
     * @param  string  $token
     */
    public function __construct(string $token)
    {
        parent::__construct();

        $this->token = $token;

        $this->request = $this->prepareRequest();
    }

    /**
     * @return PendingRequest
     */
    private function prepareRequest(): PendingRequest
    {
        $baseUrl = Config::get('iss-produto.base_uri').Config::get('iss-produto.prefix');

        return $this->request = Http::withToken($this->token)
            ->baseUrl($baseUrl)
            ->withOptions(self::DEFAULT_OPTIONS)
            ->withHeaders(self::DEFAULT_HEADERS);
    }

    /**
     * @return RealStateDevelopmentResource
     */
    public function realStateDevelopment(): RealStateDevelopmentResource
    {
        return new RealStateDevelopmentResource($this);
    }
}
