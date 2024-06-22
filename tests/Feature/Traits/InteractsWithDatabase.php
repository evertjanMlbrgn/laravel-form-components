<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Traits;

use Illuminate\Database\Eloquent\Model;

trait InteractsWithDatabase
{
    protected function setupDatabase()
    {
        Model::unguard();

        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__.'/../database/migrations/create_posts_table.php';
        include_once __DIR__.'/../database/migrations/create_comments_table.php';
        include_once __DIR__.'/../database/migrations/create_comment_post_table.php';
        include_once __DIR__.'/../database/migrations/create_commentables_table.php';

        (new \CreatePostsTable)->up();
        (new \CreateCommentsTable)->up();
        (new \CreateCommentPostTable)->up();
        (new \CreateCommentablesTable)->up();
    }
}
