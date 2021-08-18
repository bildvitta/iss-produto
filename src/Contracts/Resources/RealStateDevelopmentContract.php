<?php

namespace Bildvitta\IssProduto\Contracts\Resources;

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
    public const ENDPOINT_FIND_BY_UUID = self::ENDPOINT_PREFIX . '/%s';

    /**
     * @param array $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function search(array $query = []): object;

    /**
     * @param string $uuid
     *
     * @return object
     *
     * @throws RequestException
     */
    public function find(string $uuid): object;
}
