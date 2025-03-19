<?php

namespace Bildvitta\IssProduto\Contracts\Resources;

use Illuminate\Http\Client\RequestException;

/**
 * Interface BuyingOptionsContract.
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
     * @throws RequestException
     */
    public function search(array $query = [], array $body = []): object;

    /**
     * @throws RequestException
     */
    public function find(string $uuid): object;
}
