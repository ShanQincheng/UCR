<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $mobile
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrivilege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Account|null $account
 * @property int|null $privilege_id
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $lease
 * @property-read int|null $lease_count
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrivilegeId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lease[] $leases
 * @property-read int|null $leases_count
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'privilege_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the account associated with the user.
     */
    public function account() {
        return $this->hasOne(Account::class, 'user_id');
    }

    /**
     * Get the privilege that owns the user.
     */
    public function privilege() {
        return $this->belongsTo(Privilege::class, 'privilege_id');
    }

    /**
     * Get the leases for the user.
     */
    public function leases() {
        return $this->hasMany(Lease::class, 'user_id');
    }

    public function isSuperAdmin() {
        $superAdminPrivilegeID = Privilege::select('id')
            ->where('name', 'super-admin')->get();

        return $superAdminPrivilegeID->contains('id', $this->privilege_id);
    }

    public function isCustomer() {
        $customerPrivilegeIDs = Privilege::select('id')
            ->whereIn('name', ['student', 'customer'])->get();

        return $customerPrivilegeIDs->contains('id', $this->privilege_id);
    }

    public function isStaffOrAdmin() {
        $staffAndAdminPrivilegeIDs = Privilege::select('id')
            ->whereIn('name', ['staff', 'admin'])->get();

        return $staffAndAdminPrivilegeIDs->contains('id', $this->privilege_id);
    }

    public function isStaff() {
        $staffPrivilegeID = Privilege::select('id')
            ->where('name', 'staff')->get();

        return $staffPrivilegeID->contains('id', $this->privilege_id);
    }

    public function isAdmin() {
        $adminPrivilegeID = Privilege::select('id')
            ->where('name', 'admin')->get();

        return $adminPrivilegeID->contains('id', $this->privilege_id);
    }
}
