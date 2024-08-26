<?php /** @noinspection SpellCheckingInspection */

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Traits;

use Illuminate\Database\Eloquent\Model;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\Migrations\CreateCommentablesTable;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\Migrations\CreateCommentPostTable;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\Migrations\CreateCommentsTable;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\Migrations\CreatePostsTable;

trait InteractsWithDatabase
{
    protected function setupDatabase(): void
    {
        Model::unguard();

        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__.'/../Database/Migrations/create_posts_table.php';
        include_once __DIR__.'/../Database/Migrations/create_comments_table.php';
        include_once __DIR__.'/../database/migrations/create_comment_post_table.php';
        include_once __DIR__.'/../database/migrations/create_commentables_table.php';

        (new CreatePostsTable)->up();
        (new CreateCommentsTable)->up();
        (new CreateCommentPostTable)->up();
        (new CreateCommentablesTable)->up();
    }
}
