<?php

namespace Bildvitta\IssProduto\Models;

use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class RealEstateDevelopment extends Model
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

    public function work_period_installment_integration_table(): HasOne
    {
        return $this->hasOne(
            InstallmentIntegrationTable::class,
            'id',
            'work_period_installment_integration_table_id'
        );
    }

    public function post_construction_installment_integration_table(): HasOne
    {
        return $this->hasOne(
            InstallmentIntegrationTable::class,
            'id',
            'post_construction_installment_integration_table_id'
        );
    }
}
