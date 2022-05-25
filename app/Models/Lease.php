<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lease
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Lease newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lease newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lease query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $computer_id
 * @property float $deposit
 * @property float $insurance
 * @property int $start_time
 * @property int $end_time
 * @property int|null $return_time
 * @property float $fee
 * @property float $fee_penalty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereComputerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereFeePenalty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereReturnTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereUserId($value)
 * @property int $discount
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereDiscount($value)
 * @property int|null $staff_confirm
 * @method static \Illuminate\Database\Eloquent\Builder|Lease whereStaffConfirm($value)
 */
class Lease extends Model
{
    use HasFactory;

    protected $table = 'leases';

    protected $fillable = [
      'user_id',
      'computer_id',
      'deposit',
      'insurance',
      'discount',
      'start_time',
      'end_time',
      'return_time',
      'fee',
      'fee_penalty',
    ];

    /**
     * Get the users for the lease.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
