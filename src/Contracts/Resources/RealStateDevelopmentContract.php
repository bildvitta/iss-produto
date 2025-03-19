<?php

namespace Bildvitta\IssProduto\Contracts\Resources;

use Bildvitta\IssProduto\Resources\RealEstateDevelopments\MirrorResource;
use Illuminate\Http\Client\RequestException;

/**
 * Interface RealStateDevelopmentContract.
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
     * @const string
     */
    public const ENDPOINT_UNIT_PREFIX = self::ENDPOINT_FIND_BY_UUID.'/unities';

    public function mirrors(): MirrorResource;

    /**
     * @throws RequestException
     */
    public function search(array $query = [], array $body = []): object;

    /**
     * @throws RequestException
     */
    public function find(string $uuid): object;
}
