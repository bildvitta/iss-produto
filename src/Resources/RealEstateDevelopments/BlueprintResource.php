<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\BlueprintContract;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\Blueprints\ImageResource;
use Illuminate\Http\Client\RequestException;

class BlueprintResource extends BaseResource implements BlueprintContract
{
    public function images(): ImageResource
    {
        return new ImageResource($this->issProduto);
    }

    /**
     * @throws RequestException
     */
    public function get(string $realEstateDevelopmentUuid, array $query = []): object
    {
        $endpoint = self::ENDPOINT_INDEX;
        if ($this->issProduto->getProgrammatic()) {
            $endpoint = '/programmatic'.$endpoint;
        }

        return $this->issProduto->request
            ->get(vsprintf($endpoint, [$realEstateDevelopmentUuid]), $query)
            ->throw()
            ->object();
    }
}
