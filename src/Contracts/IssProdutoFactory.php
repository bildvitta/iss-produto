<?php

namespace Bildvitta\IssProduto\Contracts;

use Bildvitta\IssProduto\Resources\RealStateDevelopmentResource;

/**
 * Interface IssProdutoFactory.
 *
 * @package Bildvitta\IssProduto\Contracts
 */
interface IssProdutoFactory
{
    /**
     * @const array
     */
    public const DEFAULT_HEADERS = [
        'content-type' => 'application/json',
        'accept' => 'application/json',
        'User-Agent' => 'ISS v0.0.1-alpha'
    ];

    /**
     * @const array
     */
    public const DEFAULT_OPTIONS = ['allow_redirects' => false];

    /**
     * @return RealStateDevelopmentResource
     */
    public function realStateDevelopment(): RealStateDevelopmentResource;
}