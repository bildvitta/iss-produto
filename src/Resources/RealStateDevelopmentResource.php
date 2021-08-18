<?php

namespace Bildvitta\IssProduto\Resources;

use Bildvitta\IssProduto\Contracts\Resources\RealStateDevelopmentContract;
use Bildvitta\IssProduto\IssProduto;
use Illuminate\Http\Client\RequestException;

/**
 * Class RealStateDevelopmentResource.
 *
 * @package Bildvitta\IssProduto\Resources
 */
class RealStateDevelopmentResource implements RealStateDevelopmentContract
{
    /**
     * @var IssProduto
     */
    private IssProduto $issProduto;

    /**
     * RealStateDevelopmentResource constructor.
     *
     * @param IssProduto $issProduto
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    /**
     * @param array $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function search(array $query = []): object
    {
        return $this->issProduto->request->get(self::ENDPOINT_PREFIX, $query)->throw()->object();
    }

    /**
     * @param string $uuid
     *
     * @return object
     *
     * @throws RequestException
     */
    public function find(string $uuid): object
    {
        return $this->issProduto->request->get(vsprintf(self::ENDPOINT_FIND_BY_UUID, [$uuid]))->throw()->object();
    }
}
