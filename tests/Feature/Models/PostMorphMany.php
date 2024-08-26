<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PostMorphMany extends Model
{
    protected $table = 'posts';

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
