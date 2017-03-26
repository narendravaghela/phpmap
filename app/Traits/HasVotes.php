<?php

namespace App\Traits;

use App\Models\Site\Vote;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasVotes
{
    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}
