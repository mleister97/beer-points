<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Drink
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property float $price
 * @property float $points
 * @method static \Illuminate\Database\Eloquent\Builder|Drink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drink query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drink wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drink wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Drink extends Model
{
}
