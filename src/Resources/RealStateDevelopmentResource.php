<?php

namespace Bildvitta\IssProduto\Resources;

use Bildvitta\IssProduto\Contracts\Resources\RealStateDevelopmentContract;
use Bildvitta\IssProduto\IssProduto;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\BlueprintResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\UnitResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\CharacteristicResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\MirrorResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\StageResource;
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
     * @param  IssProduto  $issProduto
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
     * @return CharacteristicResource
     */
    public function characteristics(): CharacteristicResource
    {
        return new CharacteristicResource($this->issProduto);
    }

    /**
     * @return StageResource
     */
    public function stages(): StageResource
    {
        return new StageResource($this->issProduto);
    }
    
    /**
     * @return BlueprintResource
     */
    public function blueprints(): BlueprintResource
    {
        return new BlueprintResource($this->issProduto);
    }

    /**
     * @return UnitResource
     */
    public function units(): UnitResource
    {
        return new UnitResource($this->issProduto);
    }

    /**
     * @param  array  $query
     * @param  array  $body
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
     * @param  string  $uuid
     * @param  array  $data
     *
     * @return object
     *
     * @throws RequestException
     */
    public function update(string $uuid, array $data = []): object
    {
        return $this->issProduto->request->put(vsprintf(self::ENDPOINT_FIND_BY_UUID, [$uuid]), $data)->throw()->object();
    }
}
