<?php

namespace App\Models\Forums;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Discussion extends Model
{
    use Searchable;

    protected $table = 'chatter_discussions';

    protected $guarded = [];

    public function searchableAs()
    {
        return 'forum_discussions';
    }
}
