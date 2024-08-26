<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;

class PostMorphMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
