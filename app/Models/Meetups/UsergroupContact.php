<?php

namespace App\Models\Meetups;

use Illuminate\Database\Eloquent\Model;

class UsergroupContact extends Model
{
    protected $fillable = [
        'url', 'name', 'type', 'icon', 'usergroup_id',
    ];
}
