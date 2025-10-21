<?php

namespace Bildvitta\IssProduto\Models\CreditPolicy;

use Bildvitta\IssProduto\Models\BuyingOption;
use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferType extends Model
{
    use SoftDeletes, UsesProdutoDB;

    protected $connection = 'iss-produto';

    protected $table = 'transfer_types';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function buying_options(): HasMany
    {
        return $this->hasMany(BuyingOption::class);
    }

    public function credit_policies(): HasMany
    {
        return $this->hasMany(CreditPolicy::class);
    }
}
