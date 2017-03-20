<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    protected $fillable = [
        'title', 'icon', 'body', 'action_url', 'action_title', 'position',
    ];
}
