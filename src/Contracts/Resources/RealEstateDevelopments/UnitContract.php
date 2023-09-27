<?php

namespace Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments;

use Illuminate\Http\Client\RequestException;

interface UnitContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/real-estate-developments/%s';

    /**
     * @const string
     */
    public const ENDPOINT_INDEX = self::ENDPOINT_PREFIX.'/units';

    /**
     * @const string
     */
    public const ENDPOINT_UPDATE = self::ENDPOINT_PREFIX.'/units/%s';

    /**
     * @param  string  $realEstateDevelopment
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function get(string $realEstateDevelopment, array $query = []): object;

    /**
     * @param  string  $realEstateDevelopment
     * @param string $unit
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function update(string $realEstateDevelopment, string $unit, array $data = []): object;
}
