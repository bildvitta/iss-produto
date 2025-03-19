<?php

namespace Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\Blueprints;

use Illuminate\Http\Client\RequestException;

interface ImageContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/real-estate-developments/%s/blueprints/%s';

    /**
     * @const string
     */
    public const ENDPOINT_INDEX = self::ENDPOINT_PREFIX.'/images';

    /**
     * @throws RequestException
     */
    public function get(string $realEstateDevelopmentUuid, string $blueprintUuid, array $query = []): object;
}
