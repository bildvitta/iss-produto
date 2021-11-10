<?php

namespace Bildvitta\IssProduto\Contracts\Resources;

use Bildvitta\IssProduto\Resources\RealEstateDevelopments\MirrorResource;
use Illuminate\Http\Client\RequestException;

/**
 * Interface RealStateDevelopmentContract.
 *
 * @package Bildvitta\IssProduto\Contracts\Resources
 */
interface RealStateDevelopmentContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/programmatic/real-estate-developments';

    /**
     * @const string
     */
    public const ENDPOINT_FIND_BY_UUID = self::ENDPOINT_PREFIX.'/%s';

    /**
     * @return MirrorResource
     */
    public function mirrors(): MirrorResource;

    /**
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function search(array $query = [], array $body = []): object;

    /**
     * @param  string  $uuid
     *
     * @return object
     *
     * @throws RequestException
     */
    public function find(string $uuid): object;
}
