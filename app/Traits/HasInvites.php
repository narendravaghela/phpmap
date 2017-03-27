<?php

namespace App\Traits;

use App\Models\Users\Invite;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasInvites
{
    /**
     * @return mixed
     */
    public function invite(): MorphOne
    {
        return $this->morphOne(Invite::class, 'claimer');
    }
}
