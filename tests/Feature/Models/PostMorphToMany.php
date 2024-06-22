<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Models\Comment;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Traits\InteractsWithDatabase;

class PostMorphToMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
