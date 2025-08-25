<?php

namespace Ngankt2\VNBank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class VNBank
 *
 * @property int $id
 * @property string $name
 * @property string $bank_id
 * @property string $atm_bin
 * @property int $card_length
 * @property string $short_name
 * @property string $bank_code
 * @property string $type
 * @property string|null $swift_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class VNBank extends Model
{
    protected $table = 'vn_banks';

    protected $fillable = [
        'name',
        'bank_id',
        'atm_bin',
        'card_length',
        'short_name',
        'bank_code',
        'type',
        'swift_code',
    ];
}