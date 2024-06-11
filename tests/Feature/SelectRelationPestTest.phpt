<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature;

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PostBelongsToMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->belongsToMany(\Mlbrgn\LaravelFormComponents\Tests\Feature\Comment::class, 'comment_post', 'post_id', 'comment_id');
    }
}

class PostMorphMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

class PostMorphToMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}

class Comment extends Model
{
}

uses(\Mlbrgn\LaravelFormComponents\Tests\Feature\InteractsWithDatabase::class);

it('handles belongs to many relationships', function () {
    $this->setupDatabase();

    $post = PostBelongsToMany::create(['content' => 'Content']);

    $commentA = Comment::create(['content' => 'Content A']);
    $commentB = Comment::create(['content' => 'Content B']);
    $commentC = Comment::create(['content' => 'Content C']);

    comments()->sync([$commentA->getKey(), $commentC->getKey()]);

    $options = Comment::get()->pluck('content', 'id');

    Route::get('select-relation', function () use ($post, $options) {
        return view('select-relation')
            ->with('post', $post)
            ->with('options', $options);
    })->middleware('web');

    DB::enableQueryLog();

    $this->visit('/select-relation')
        ->seeElement('option[value="' . $commentA->getKey() . '"]:selected')
        ->seeElement('option[value="' . $commentB->getKey() . '"]:not(:selected)')
        ->seeElement('option[value="' . $commentC->getKey() . '"]:selected');

    // make sure we cache the result for each option element
    expect(DB::getQueryLog())->toHaveCount(1);
});

it('handles morph many relationships', function () {
    $this->setupDatabase();

    $post = PostMorphMany::create(['content' => 'Content']);

    $commentA = comments()->create(['content' => 'Content A']);
    $commentB = Comment::create(['content' => 'Content B']);
    $commentC = comments()->create(['content' => 'Content C']);

    $options = Comment::get()->pluck('content', 'id');

    Route::get('select-relation', function () use ($post, $options) {
        return view('select-relation')
            ->with('post', $post)
            ->with('options', $options);
    })->middleware('web');

    DB::enableQueryLog();

    $this->visit('/select-relation')
        ->seeElement('option[value="' . $commentA->getKey() . '"]:selected')
        ->seeElement('option[value="' . $commentB->getKey() . '"]:not(:selected)')
        ->seeElement('option[value="' . $commentC->getKey() . '"]:selected');

    // make sure we cache the result for each option element
    expect(DB::getQueryLog())->toHaveCount(1);
});

it('handles morph to many relationships', function () {
    $this->setupDatabase();

    $post = PostMorphToMany::create(['content' => 'Content']);

    $commentA = comments()->create(['content' => 'Content A']);
    $commentB = Comment::create(['content' => 'Content B']);
    $commentC = comments()->create(['content' => 'Content C']);

    $options = Comment::get()->pluck('content', 'id');

    Route::get('select-relation', function () use ($post, $options) {
        return view('select-relation')
            ->with('post', $post)
            ->with('options', $options);
    })->middleware('web');

    DB::enableQueryLog();

    $this->visit('/select-relation')
        ->seeElement('option[value="' . $commentA->getKey() . '"]:selected')
        ->seeElement('option[value="' . $commentB->getKey() . '"]:not(:selected)')
        ->seeElement('option[value="' . $commentC->getKey() . '"]:selected');

    // make sure we cache the result for each option element
    expect(DB::getQueryLog())->toHaveCount(1);
});
