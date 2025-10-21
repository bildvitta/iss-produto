<?php

namespace Bildvitta\IssProduto\Models\CreditPolicy;

use Bildvitta\IssProduto\Enums\CreditPolicy\Parameter\Type;
use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditPolicyParameter extends Model
{
    use SoftDeletes, UsesProdutoDB;

    protected $connection = 'iss-produto';

    protected $table = 'credit_policy_parameters';

    protected $casts = [
        'is_approval_required' => 'boolean',
        'verge_one' => 'float',
        'verge_two' => 'float',
        'verge_three' => 'float',
        'verge_four' => 'float',
        'verge_five' => 'float',
        'type' => Type::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function credit_policy(): BelongsTo
    {
        return $this->belongsTo(CreditPolicy::class);
    }
}
