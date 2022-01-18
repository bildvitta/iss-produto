<?php

namespace Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments;

use Illuminate\Http\Client\RequestException;

interface CharacteristicContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/real-estate-developments/%s';

    /**
     * @const string
     */
    public const ENDPOINT_REFLECT_UNITIES = self::ENDPOINT_PREFIX.'/characteristics/reflector_characteristics';

    /**
     * @param  string  $realEstateUuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function reflectorCharacteristics(string $realEstateUuid, array $query = []): object;
}
