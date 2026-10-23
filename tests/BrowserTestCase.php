<?php

namespace Mlbrgn\LaravelFormComponents\Tests;

use Mlbrgn\LaravelFormComponents\Providers\FormComponentsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class BrowserTestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [FormComponentsServiceProvider::class];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('app.key', 'base64:BOiGLFUC+84Du2o8GYos0kGJaj4zGX9M9BkLsAj04Ik=');
    }
}
