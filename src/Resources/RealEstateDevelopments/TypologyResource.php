<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\TypologyContract;
use Illuminate\Http\Client\RequestException;

class TypologyResource extends BaseResource implements TypologyContract
{
    /**
     * @param  string  $realEstateUuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function reflectorBlueprints(string $realEstateUuid, array $query = []): object
    {
        return $this->reflector($realEstateUuid, $query, self::ENDPOINT_REFLECT_BLUEPRINTS);
    }
}
