<?php

namespace Bildvitta\IssProduto\Contracts\Resources;

use Illuminate\Http\Client\RequestException;

/**
 * Interface BuyingOptionsContract.
 *
 * @package Bildvitta\IssProduto\Contracts\Resources
 */
interface BuyingOptionsContract
{
    /**
     * @const string
     */
    public const ENDPOINT_PREFIX = '/programmatic/buying-options';

    /**
     * @const string
     */
    public const ENDPOINT_FIND_BY_UUID = self::ENDPOINT_PREFIX.'/%s';

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
