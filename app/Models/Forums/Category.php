<?php

namespace App\Models\Forums;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use Searchable;

    protected $table = 'chatter_categories';

    protected $guarded = [];

    public function searchableAs()
    {
        return 'forum_categories';
    }
}
