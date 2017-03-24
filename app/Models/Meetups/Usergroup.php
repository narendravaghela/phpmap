<?php

namespace App\Models\Meetups;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
{
    protected $fillable = [
        'name', 'shortname', 'url', 'icalendar_url', 'latitude', 'longitude', 'state', 'country', 'slug',
    ];

    public function contacts()
    {
        return $this->hasMany(UsergroupContact::class);
    }

    public function tags()
    {
        return $this->hasMany(UsergroupTag::class);
    }
}
