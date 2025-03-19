<?php

namespace Bildvitta\IssProduto\Resources;

use Bildvitta\IssProduto\Contracts\Resources\BuyingOptionsContract;
use Bildvitta\IssProduto\IssProduto;
use Illuminate\Http\Client\RequestException;

/**
 * Class RealStateDevelopmentResource.
 */
class BuyingOptionsResource implements BuyingOptionsContract
{
    private IssProduto $issProduto;

    /**
     * RealStateDevelopmentResource constructor.
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    /**
     * @throws RequestException
     */
    public function search(array $query = [], array $body = []): object
    {
        $url = self::ENDPOINT_PREFIX;

        $request = $this->issProduto->request;

        if ($body) {
            $request->withBody(json_encode($body), 'application/json');
        }

        return $request->get($url, $query)->throw()->object();
    }

    /**
     * @throws RequestException
     */
    public function find(string $uuid, array $query = []): object
    {
        return $this->issProduto->request->get(vsprintf(self::ENDPOINT_FIND_BY_UUID, [$uuid]), $query)->throw()->object();
    }
}
