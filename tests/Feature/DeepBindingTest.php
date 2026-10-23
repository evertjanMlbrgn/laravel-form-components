<?php

use Mlbrgn\LaravelFormComponents\Tests\TestCase;

it('can bind to nested arrays automatically', function () {
    $data = [
        'user' => [
            'name' => 'John Doe',
        ],
    ];

    $view = $this->blade(
        '<x-form-form :bind="$data">
            <x-form-input name="user[name]" />
        </x-form-form>',
        ['data' => $data]
    );

    $view->assertSee('value="John Doe"', false);
});

it('can bind to nested objects automatically', function () {
    $data = (object) [
        'user' => (object) [
            'name' => 'Jane Doe',
            'profile' => (object) [
                'bio' => 'Software Engineer',
            ],
        ],
    ];

    $view = $this->blade(
        '<x-form-form :bind="$data">
            <x-form-input name="user[name]" />
            <x-form-input name="user[profile][bio]" />
        </x-form-form>',
        ['data' => $data]
    );

    $view->assertSee('value="Jane Doe"', false);
    $view->assertSee('value="Software Engineer"', false);
});

it('prioritizes old data in deep binding automatically', function () {
    $data = ['user' => ['name' => 'John']];
    
    $this->app['request']->setLaravelSession($this->app['session']->driver());
    session()->flashInput(['user' => ['name' => 'Jane']]);

    $view = $this->blade(
        '<x-form-form :bind="$data">
            <x-form-input name="user[name]" />
        </x-form-form>',
        ['data' => $data]
    );

    $view->assertSee('value="Jane"', false);
});

it('can bind to collection items automatically', function () {
    $data = [
        'users' => collect([
            ['name' => 'User 1'],
            ['name' => 'User 2'],
        ]),
    ];

    $view = $this->blade(
        '<x-form-form :bind="$data">
            <x-form-input name="users[0][name]" />
            <x-form-input name="users[1][name]" />
        </x-form-form>',
        ['data' => $data]
    );

    $view->assertSee('value="User 1"', false);
    $view->assertSee('value="User 2"', false);
});
