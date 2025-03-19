<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\IssProduto;
use Illuminate\Http\Client\RequestException;

class BaseResource
{
    protected IssProduto $issProduto;

    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    /**
     * @throws RequestException
     */
    public function reflector(string $realEstateUuid, array $query, string $endpoint): object
    {
        if ($this->issProduto->getProgrammatic()) {
            $endpoint = '/programmatic'.$endpoint;
        }

        return $this->issProduto->request
            ->get(vsprintf($endpoint, [$realEstateUuid]), $query)
            ->throw()
            ->object();
    }
}
