<?php

namespace Bildvitta\IssProduto\Models\CreditPolicy;

use Bildvitta\IssProduto\Models\RealEstateDevelopment;
use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditPolicy extends Model
{
    use SoftDeletes, UsesProdutoDB;

    protected $connection = 'iss-produto';

    protected $table = 'credit_policies';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function transfer_type(): BelongsTo
    {
        return $this->belongsTo(TransferType::class)->withTrashed();
    }

    public function parameters(): HasMany
    {
        return $this->hasMany(CreditPolicyParameter::class, 'credit_policy_id', 'id');
    }

    public function real_estate_developments(): BelongsToMany
    {
        return $this->belongsToMany(
            RealEstateDevelopment::class,
            'credit_policy_real_estate_development',
            'credit_policy_id',
            'real_estate_development_id'
        )
            ->withTimestamps()
            ->withoutGlobalScopes();
    }
}
