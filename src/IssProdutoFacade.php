<?php

namespace Bildvitta\IssProduto;

use Illuminate\Support\Facades\Facade;
use RuntimeException;

/**
 * @see \Bildvitta\IssProduto\IssProduto
 */
class IssProdutoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'iss-produto';
    }
}
