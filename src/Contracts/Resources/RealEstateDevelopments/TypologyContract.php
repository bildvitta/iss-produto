<?php

namespace Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments;

use Illuminate\Http\Client\RequestException;

interface TypologyContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/real-estate-developments/%s';

    /**
     * @const string
     */
    public const ENDPOINT_REFLECT_BLUEPRINTS = self::ENDPOINT_PREFIX.'/typologies/reflector_blueprints';

    /**
     * @throws RequestException
     */
    public function reflectorBlueprints(string $realEstateUuid, array $query = []): object;
}
