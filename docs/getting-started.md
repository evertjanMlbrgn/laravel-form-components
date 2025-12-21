### Getting started

#### Requirements
- Laravel 10+ (works with recent LTS versions)
- Bootstrap 5 on the frontend

#### Install
```bash
composer require mlbrgn/laravel-form-components
```

Publish the config and assets:
```bash
php artisan vendor:publish --tag=mlbrgn-form-components-config
php artisan vendor:publish --tag=mlbrgn-form-components-assets
```

This creates `config/form-components.php` and publishes assets to `public/vendor/mlbrgn/laravel-form-components/`.

Optionally change the Blade tag prefix (default: `form`):
```php
// config/form-components.php
'tag_prefix' => env('FORM_COMPONENTS_TAG_PREFIX', 'form'),
```

#### First form
```blade
<x-form-form action="{{ route('posts.store') }}" method="POST">
  <x-form-group>
    <x-form-label for="title">Title</x-form-label>
    <x-form-input id="title" name="title" required />
    <x-form-errors name="title" />
  </x-form-group>

  <x-form-textarea name="content" rows="6" />

  <x-form-submit>Save</x-form-submit>
</x-form-form>
```

Client-side validation assets are loaded automatically if the form’s validation mode is `client-default` or `client-custom`. See Validation.
