<?php

namespace App\Models\Meetups;

use Illuminate\Database\Eloquent\Model;

class UsergroupTag extends Model
{
    protected $fillable = [
        'name', 'description', 'usergroup_id',
    ];
}
