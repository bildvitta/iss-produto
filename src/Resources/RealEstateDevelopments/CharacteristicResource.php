<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\CharacteristicContract;
use Illuminate\Http\Client\RequestException;

class CharacteristicResource extends BaseResource implements CharacteristicContract
{
    /**
     * @throws RequestException
     */
    public function reflectorCharacteristics(string $realEstateUuid, array $query = []): object
    {
        return $this->reflector($realEstateUuid, $query, self::ENDPOINT_REFLECT_UNITIES);
    }
}
