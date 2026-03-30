<?php

namespace Bildvitta\IssProduto\Models;

use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Unit extends Model
{
    use SoftDeletes, UsesProdutoDB;

    protected $connection = 'iss-produto';

    public static function boot(): void
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }

    public function matchUnit(string|int $externalCode): ?self
    {
        return $this->newQuery()
            ->leftJoin('mirrors', 'mirrors.id', '=', 'units.mirror_id')
            ->leftJoin('real_estate_development_modules as modules', 'modules.mirror_id', '=', 'mirrors.id')
            ->where('units.external_code', $externalCode)
            ->select([
                'units.external_code',
                'units.square_meters',
                'modules.apf',
                'modules.mega_phase_code',
                'modules.module',
                'modules.date_contract_registration',
            ])
            ->first();
    }
}
