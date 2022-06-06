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
     * @param  string  $realEstateDevelopmentUuid
     * @param  string  $blueprintUuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function get(string $realEstateDevelopmentUuid, string $blueprintUuid, array $query = []): object;
}
