<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments\Blueprints;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\Blueprints\ImageContract;
use Bildvitta\IssProduto\Resources\RealEstateDevelopments\BaseResource;
use Illuminate\Http\Client\RequestException;

class ImageResource extends BaseResource implements ImageContract
{
    /**
     * @throws RequestException
     */
    public function get(string $realEstateDevelopmentUuid, string $blueprintUuid, array $query = []): object
    {
        $endpoint = self::ENDPOINT_INDEX;
        if ($this->issProduto->getProgrammatic()) {
            $endpoint = '/programmatic'.$endpoint;
        }

        return $this->issProduto->request
            ->get(vsprintf($endpoint, [$realEstateDevelopmentUuid, $blueprintUuid]), $query)
            ->throw()
            ->object();
    }
}
