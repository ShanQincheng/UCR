<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlackHistory
 *
 * @property-read \App\Models\Lease|null $leases
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|BlackHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlackHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlackHistory query()
 * @mixin \Eloquent
 */
class BlackHistory extends Model
{
    protected $table = 'black_history';

    protected $fillable = [
        'user_id',
        'lease_id',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leases() {
        return $this->belongsTo(Lease::class, 'lease_id');
    }
}
