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
 * @property int $id
 * @property string $name
 * @property int $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privilege whereUpdatedAt($value)
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
