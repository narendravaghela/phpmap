<?php

namespace App\Models\Site;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Vote extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function voteable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function sum(Model $voteable): float
    {
        return $voteable->votes()
            ->sum('value');
    }

    public static function count(Model $voteable): int
    {
        return $voteable->votes()
            ->count();
    }

    public static function countUps(Model $voteable, $value = 1): int
    {
        return $voteable->votes()
            ->where('value', $value)
            ->count();
    }

    public static function countDowns(Model $voteable, $value = -1): int
    {
        return $voteable->votes()
            ->where('value', $value)
            ->count();
    }

    public static function countByDate(Model $voteable, $from, $to = null): int
    {
        $query = $voteable->votes();

        if (! empty($to)) {
            $range = [new Carbon($from), new Carbon($to)];
        } else {
            $range = [
                (new Carbon($from))->startOfDay(),
                (new Carbon($to))->endOfDay(),
            ];
        }

        return $query->whereBetween('created_at', $range)
            ->count();
    }

    public static function up(Model $voteable): bool
    {
        return (bool) static::cast($voteable, 1);
    }

    public static function down(Model $voteable): bool
    {
        return (bool) static::cast($voteable, -1);
    }

    public function setValueAttribute($value): void
    {
        $this->attributes['value'] = ($value == -1) ? -1 : 1;
    }

    protected static function cast(Model $voteable, $value = 1): bool
    {
        if (! $voteable->exists) {
            return false;
        }

        $vote = new static();
        $vote->value = $value;

        return (bool) $vote->voteable()
            ->associate($voteable)
            ->save();
    }
}
