<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\MirrorContract;
use Bildvitta\IssProduto\IssProduto;
use Illuminate\Http\Client\RequestException;

class MirrorResource implements MirrorContract
{
    /**
     * @var IssProduto
     */
    private IssProduto $issProduto;

    /**
     * @param  IssProduto  $issProduto
     */
    public function __construct(IssProduto $issProduto)
    {
        $this->issProduto = $issProduto;
    }

    /**
     * @param  string  $realEstateUuid
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function reflectorUnities(string $realEstateUuid, array $query = []): object
    {
        return $this->issProduto->request
            ->get(vsprintf(self::ENDPOINT_REFLECT_UNITIES, [$realEstateUuid]), $query)
            ->throw()
            ->object();
    }
}
