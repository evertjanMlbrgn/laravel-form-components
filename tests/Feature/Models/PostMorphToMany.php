<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class PostMorphToMany extends Model
{
    protected $table = 'posts';

    public function comments(): MorphToMany
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
