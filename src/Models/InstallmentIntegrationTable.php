<?php

namespace Bildvitta\IssProduto\Models;

use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class InstallmentIntegrationTable extends Model
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

    public function signal_installments(): HasMany
    {
        return $this->hasMany(InstallmentIntegrationTableSignalInstallment::class);
    }

    public function pre_key_validities(): HasMany
    {
        return $this->hasMany(InstallmentIntegrationTablePreKeyValidity::class);
    }

    public function post_key_validities(): HasMany
    {
        return $this->hasMany(InstallmentIntegrationTablePostKeyValidity::class);
    }
}
