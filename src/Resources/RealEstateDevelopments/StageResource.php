<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\StageContract;
use Illuminate\Http\Client\RequestException;

class StageResource extends BaseResource implements StageContract
{
    /**
     * @throws RequestException
     */
    public function get(string $realEstateUuid, array $query = []): object
    {
        return $this->reflector($realEstateUuid, $query, self::ENDPOINT_INDEX);
    }
}
