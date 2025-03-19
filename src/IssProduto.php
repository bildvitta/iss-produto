<?php

namespace Bildvitta\IssProduto;

use Bildvitta\IssProduto\Contracts\IssProdutoFactory;
use Bildvitta\IssProduto\Resources\BuyingOptionsResource;
use Bildvitta\IssProduto\Resources\RealStateDevelopmentResource;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

/**
 * Class IssProduto.
 */
class IssProduto extends HttpClient implements IssProdutoFactory
{
    public PendingRequest $request;

    private ?string $token;

    private bool $programmatic = true;

    /**
     * Hub constructor.
     *
     *
     * @throws RequestException
     */
    public function __construct(?string $token = '')
    {
        parent::__construct();

        if ($token != '') {
            $this->programmatic = false;
        }

        $this->setToken($token);
    }

    /**
     * @return IssProduto
     *
     * @throws RequestException
     */
    public function setToken(string $token)
    {
        $this->token = $token;

        if ($this->programmatic) {
            $clientId = Config::get('hub.programatic_access.client_id');
            if (Cache::has($clientId)) {
                $accessToken = Cache::get($clientId);
            } else {
                $accessToken = $this->getToken();
                Cache::add($clientId, $accessToken, now()->addSeconds(31536000));
            }
            $this->token = $accessToken;
        }

        $this->prepareRequest();

        return $this;
    }

    /**
     * @return array|mixed
     *
     * @throws RequestException
     */
    private function getToken()
    {
        $hubUrl = Config::get('hub.base_uri').Config::get('hub.oauth.token_uri');
        $clientId = Config::get('hub.programatic_access.client_id');
        $secretId = Config::get('hub.programatic_access.client_secret');
        $response = Http::asForm()->post($hubUrl, [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $secretId,
            'scope' => '*',
        ]);

        return $response->json('access_token');
    }

    private function prepareRequest(): PendingRequest
    {
        $baseUrl = Config::get('iss-produto.base_uri').Config::get('iss-produto.prefix');

        return $this->request = Http::withToken($this->token)
            ->baseUrl($baseUrl)
            ->withOptions(self::DEFAULT_OPTIONS)
            ->withHeaders($this->getHeaders());
    }

    /**
     * Get default headers
     *
     * @return string[]
     */
    public function getHeaders()
    {
        return array_merge(
            self::DEFAULT_HEADERS,
            [
                'Almobi-Host' => Config::get('app.slug', ''),
            ]
        );
    }

    public function realStateDevelopment(): RealStateDevelopmentResource
    {
        return new RealStateDevelopmentResource($this);
    }

    public function buyingOptions(): BuyingOptionsResource
    {
        return new BuyingOptionsResource($this);
    }

    public function getProgrammatic(): bool
    {
        return $this->programmatic;
    }
}
