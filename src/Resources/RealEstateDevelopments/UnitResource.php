<?php

namespace Bildvitta\IssProduto\Resources\RealEstateDevelopments;

use Bildvitta\IssProduto\Contracts\Resources\RealEstateDevelopments\UnitContract;
use Illuminate\Http\Client\RequestException;

class UnitResource extends BaseResource implements UnitContract
{
    /**
     * @param  string  $realEstateDevelopment
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function get(string $realEstateDevelopment, array $query = []): object
    {
        $endpoint = self::ENDPOINT_INDEX;
        if ($this->issProduto->getProgrammatic()) {
            $endpoint = '/programmatic' . $endpoint;
        }

        return $this->issProduto->request
            ->get(vsprintf($endpoint, [$realEstateDevelopment]), $query)
            ->throw()
            ->object();
    }

    /**
     * @param  string  $realEstateDevelopment
     * @param string $unit
     * @param  array  $query
     *
     * @return object
     *
     * @throws RequestException
     */
    public function update(string $realEstateDevelopment, string $unit, array $data = []): object
    {
        $endpoint = self::ENDPOINT_UPDATE;
        if ($this->issProduto->getProgrammatic()) {
            $endpoint = '/programmatic' . $endpoint;
        }

        return $this->issProduto->request
            ->put(vsprintf($endpoint, [$realEstateDevelopment, $unit]), $data)
            ->throw()
            ->object();
    }
}
