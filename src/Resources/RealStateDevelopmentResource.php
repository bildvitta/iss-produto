<?php

namespace Bildvitta\IssProduto\Resources;

use Bildvitta\IssProduto\Contracts\Resources\RealStateDevelopmentContract;
use Bildvitta\IssProduto\IssProduto;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\MirrorResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\TypologyResource;
use Illuminate\Http\Client\RequestException;

/**
 * Class RealStateDevelopmentResource.
 *
 * @package Bildvitta\IssProduto\Resources
 */
class RealStateDevelopmentResource implements RealStateDevelopmentContract
{
    /**
     * @var IssProduto
     */
    private IssProduto $issProduto;

    /**
     * RealStateDevelopmentResource constructor.
     *
     * @param IssProduto $issProduto
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    /**
     * @return MirrorResource
     */
    public function mirrors(): MirrorResource
    {
        return new MirrorResource($this->issProduto);
    }

    /**
     * @return TypologyResource
     */
    public function typologies(): TypologyResource
    {
        return new TypologyResource($this->issProduto);
    }

    /**
     * @param array $query
     *
     * @return object
     *
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
     * @param  string  $uuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function find(string $uuid, array $query = []): object
    {
        return $this->issProduto->request->get(vsprintf(self::ENDPOINT_FIND_BY_UUID, [$uuid]), $query)->throw()->object();
    }

    /**
     * @param string $uuid
     * @param array $data
     * @return object
     *
     * @throws RequestException
     */
    public function update(string $uuid, array $data = []): object
    {
        return $this->issProduto->request->put(vsprintf(self::ENDPOINT_FIND_BY_UUID, [$uuid]), $data)->throw()->object();
    }

    /**
     * @param  string  $uuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function unities(string $uuid, array $query = [])
    {
        return $this->issProduto->request->get(vsprintf(self::ENDPOINT_UNIT_PREFIX, [$uuid]), $query)->throw()->object();
    }

    /**
     * @param string $realEstateDevelopment
     * @param array $data
     * @return object
     *
     * @throws RequestException
     */
    public function updateUnit(string $realEstateDevelopment, array $data = [])
    {
        return $this->issProduto->request->put(
            vsprintf(self::ENDPOINT_UNIT_PREFIX, [$realEstateDevelopment]),
            ['data' => $data]
        )->throw()->object();
    }
}
