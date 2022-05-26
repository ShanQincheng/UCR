<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Computer
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $brand
 * @property string $picture
 * @property float $rent
 * @property int $stocks
 * @property string $os
 * @property string $DISP_size
 * @property string $RAM
 * @property string $USB_port_num
 * @property string $HDMI_port
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ComputerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Computer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Computer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereDISPSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereHDMIPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereRAM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereRent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereStocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereUSBPortNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Computer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'name',
        'brand',
        'picture',
        'rent',
        'stocks',
        'os',
        'DISP_size',
        'RAM',
        'USB_port_num',
        'HDMI_port',
    ];
}
