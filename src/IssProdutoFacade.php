<?php

namespace Bildvitta\IssProduto;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bildvitta\IssProduto\IssProduto
 */
class IssProdutoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'iss-produto';
    }
}
