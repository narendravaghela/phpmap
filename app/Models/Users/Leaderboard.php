<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Leaderboard extends Model
{
    /**
     * @var string
     */
    protected $table = 'leaderboard';

    /**
     * @var array
     */
    protected $fillable = ['points', 'rank', 'locked'];

    /**
     * @var array
     */
    protected $casts = [
        'points' => 'integer',
        'rank'   => 'integer',
        'locked' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function boardable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->boardable_id;
    }

    /**
     * @return mixed
     */
    public function getType(): string
    {
        return $this->boardable_type;
    }
}