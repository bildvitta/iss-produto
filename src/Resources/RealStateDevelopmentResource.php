<?php

namespace Bildvitta\IssProduto\Resources;

use Bildvitta\IssProduto\Contracts\Resources\RealStateDevelopmentContract;
use Bildvitta\IssProduto\IssProduto;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\BlueprintResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\CharacteristicResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\MirrorResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\StageResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\TypologyResource;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\UnitResource;
use Illuminate\Http\Client\RequestException;

/**
 * Class RealStateDevelopmentResource.
 */
class RealStateDevelopmentResource implements RealStateDevelopmentContract
{
    private IssProduto $issProduto;

    /**
     * RealStateDevelopmentResource constructor.
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    public function mirrors(): MirrorResource
    {
        return new MirrorResource($this->issProduto);
    }

    public function typologies(): TypologyResource
    {
        return new TypologyResource($this->issProduto);
    }

    public function characteristics(): CharacteristicResource
    {
        return new CharacteristicResource($this->issProduto);
    }

    public function stages(): StageResource
    {
        return new StageResource($this->issProduto);
    }

    public function blueprints(): BlueprintResource
    {
        return new BlueprintResource($this->issProduto);
    }

    public function units(): UnitResource
    {
        return new UnitResource($this->issProduto);
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

    /**
     * @throws RequestException
     */
    public function update(string $uuid, array $data = []): object
    {
        return $this->issProduto->request->put(vsprintf(self::ENDPOINT_FIND_BY_UUID, [$uuid]), $data)->throw()->object();
    }
}
