<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\IssProduto;
use Illuminate\Http\Client\RequestException;

class BaseResource
{
    /**
     * @var IssProduto
     */
    protected IssProduto $issProduto;

    /**
     * @param  IssProduto  $issProduto
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    /**
     * @param string $realEstateUuid
     * @param array $query
     * @param string $endpoint
     * @return object
     *
     * @throws RequestException
     */
    public function reflector(string $realEstateUuid, array $query, string $endpoint): object
    {
        return $this->issProduto->request
            ->get(vsprintf($endpoint, [$realEstateUuid]), $query)
            ->throw()
            ->object();
    }
}
