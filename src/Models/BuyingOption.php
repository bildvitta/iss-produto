<?php

namespace Bildvitta\IssProduto\Models;

use Bildvitta\IssProduto\Models\CreditPolicy\TransferType;
use Bildvitta\IssProduto\Traits\UsesProdutoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuyingOption extends Model
{
    use SoftDeletes, UsesProdutoDB;

    public const WHEN_FLOW_SENT_LIST = [
        'without_restriction' => 'Sem restrição',
        'after_cadastral_analysis' => 'Após análise cadastral',
        'after_credit_approval' => 'Após aprovação de crédito',
        'after_bank_approval' => 'Após aprovação do banco',
    ];

    public const WHEN_FLOW_VALIDATED_LIST = [
        'without_restriction' => 'Sem restrição',
        'after_cadastral_analysis' => 'Após análise cadastral',
        'after_credit_approval' => 'Após aprovação de crédito',
        'after_bank_approval' => 'Após aprovação do banco',
    ];

    public const WHEN_MAKE_SALE_LIST = [
        'without_restriction' => 'Sem restrição',
        'after_cadastral_analysis' => 'Após análise cadastral',
        'after_credit_approval' => 'Após aprovação de crédito',
        'after_bank_approval' => 'Após aprovação do banco',
    ];

    public const WHEN_RESERVE_UNIT_LIST = [
        'without_restriction' => 'Sem restrição',
        'after_cadastral_analysis' => 'Após análise cadastral',
        'after_credit_approval' => 'Após aprovação de crédito',
        'after_bank_approval' => 'Após aprovação do banco',
    ];

    protected $connection = 'iss-produto';

    protected $table = 'buying_options';

    protected $casts = [
        'income_commitment' => 'float',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function hub_company(): BelongsTo
    {
        return $this->belongsTo(HubCompany::class);
    }

    public function transfer_type(): BelongsTo
    {
        return $this->belongsTo(TransferType::class)->withTrashed();
    }
}
