<?php

namespace Bildvitta\IssProduto\Resources;

use Bildvitta\IssProduto\IssProduto;

/**
 * Class RealStateDevelopmentResource.
 *
 * @package Bildvitta\IssProduto\Resources
 */
class RealStateDevelopmentResource
{
    /**
     * @var IssProduto
     */
    private IssProduto $issProduto;

    /**
     * RealStateDevelopmentResource constructor.
     *
     * @param  IssProduto  $issProduto
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    public function search()
    {

    }

    public function find(string $uuid)
    {

    }
}