<?php

namespace Bildvitta\IssProduto\Contracts\Resources;

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
    public const ENDPOINT_PREFIX = 'real-estate-developments';

    /**
     * @const string
     */
    public const ENDPOINT_FIND_BY_UUID = self::ENDPOINT_PREFIX . '/%s';
}
