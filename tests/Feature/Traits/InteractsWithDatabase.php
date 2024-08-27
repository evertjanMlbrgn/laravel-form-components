<?php /** @noinspection SpellCheckingInspection */

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Traits;

use Illuminate\Database\Eloquent\Model;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\CreateCommentablesTable;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\CreateCommentPostTable;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\CreateCommentsTable;
use Mlbrgn\LaravelFormComponents\Tests\Feature\Database\CreatePostsTable;

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

        include_once __DIR__.'/../Database/CreatePostsTable.php';
        include_once __DIR__.'/../Database/CreateCommentsTable.php';
        include_once __DIR__.'/../database/CreateCommentPostTable.php';
        include_once __DIR__.'/../database/CreateCommentablesTable.php';

        (new CreatePostsTable)->up();
        (new CreateCommentsTable)->up();
        (new CreateCommentPostTable)->up();
        (new CreateCommentablesTable)->up();
    }
}
