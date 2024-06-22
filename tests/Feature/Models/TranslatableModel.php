<?php

namespace Mlbrgn\LaravelFormComponents\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TranslatableModel extends Model
{
    use HasTranslations;

    public $translatable = ['input', 'output'];
}
