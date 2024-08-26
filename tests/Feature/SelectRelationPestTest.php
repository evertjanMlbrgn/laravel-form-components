<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Models\Comment;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Models\PostBelongsToMany;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Models\PostMorphMany;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Models\PostMorphToMany;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Traits\InteractsWithDatabase;

uses(InteractsWithDatabase::class);

beforeEach(function () {
    $this->setupDatabase();
});

it('handles belongs to many relationships', function () {

    $post = PostBelongsToMany::create(['content' => 'Content']);

    $commentA = Comment::create(['content' => 'Content A']);
    $commentB = Comment::create(['content' => 'Content B']);
    $commentC = Comment::create(['content' => 'Content C']);

    $post->comments()->sync([$commentA->getKey(), $commentC->getKey()]);

    $options = Comment::get()->pluck('content', 'id');

    Route::get('select-relation', function () use ($post, $options) {
        return view('select-relation')
            ->with('post', $post)
            ->with('options', $options);
    })->middleware('web');

    DB::enableQueryLog();

    $this->visit('/select-relation')
        ->seeElement('option[value="'.$commentA->getKey().'"]:selected')
        ->seeElement('option[value="'.$commentB->getKey().'"]:not(:selected)')
        ->seeElement('option[value="'.$commentC->getKey().'"]:selected');

    // make sure we cache the result for each option element
    expect(DB::getQueryLog())->toHaveCount(1);
});

it('handles morph many relationships', function () {

    $post = PostMorphMany::create(['content' => 'Content']);

    $commentA = $post->comments()->create(['content' => 'Content A']);
    $commentB = Comment::create(['content' => 'Content B']);
    $commentC = $post->comments()->create(['content' => 'Content C']);

    $options = Comment::get()->pluck('content', 'id');

    Route::get('select-relation', function () use ($post, $options) {
        return view('select-relation')
            ->with('post', $post)
            ->with('options', $options);
    })->middleware('web');

    DB::enableQueryLog();

    $this->visit('/select-relation')
        ->seeElement('option[value="'.$commentA->getKey().'"]:selected')
        ->seeElement('option[value="'.$commentB->getKey().'"]:not(:selected)')
        ->seeElement('option[value="'.$commentC->getKey().'"]:selected');

    // make sure we cache the result for each option element
    expect(DB::getQueryLog())->toHaveCount(1);
});

it('handles morph to many relationships', function () {

    $post = PostMorphToMany::create(['content' => 'Content']);

    $commentA = $post->comments()->create(['content' => 'Content A']);
    $commentB = Comment::create(['content' => 'Content B']);
    $commentC = $post->comments()->create(['content' => 'Content C']);

    $options = Comment::get()->pluck('content', 'id');

    Route::get('select-relation', function () use ($post, $options) {
        return view('select-relation')
            ->with('post', $post)
            ->with('options', $options);
    })->middleware('web');

    DB::enableQueryLog();

    $this->visit('/select-relation')
        ->seeElement('option[value="'.$commentA->getKey().'"]:selected')
        ->seeElement('option[value="'.$commentB->getKey().'"]:not(:selected)')
        ->seeElement('option[value="'.$commentC->getKey().'"]:selected');

    // make sure we cache the result for each option element
    expect(DB::getQueryLog())->toHaveCount(1);
});
