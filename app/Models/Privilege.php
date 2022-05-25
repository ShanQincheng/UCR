<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Privilege
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege query()
 * @mixin \Eloquent
 */
class Privilege extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'privileges';

    /**
     * Get the users for the privilege.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'privilege_id');
    }
}
