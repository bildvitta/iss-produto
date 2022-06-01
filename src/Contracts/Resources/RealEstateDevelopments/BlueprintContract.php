<?php

namespace Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments;

use Illuminate\Http\Client\RequestException;

interface BlueprintContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/real-estate-developments/%s';

    /**
     * @const string
     */
    public const ENDPOINT_INDEX = self::ENDPOINT_PREFIX.'/blueprints';

    /**
     * @param  string  $realEstateDevelopmentUuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function get(string $realEstateDevelopmentUuid, array $query = []): object;
}
