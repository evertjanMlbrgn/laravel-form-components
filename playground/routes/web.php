<?php

use Illuminate\Support\Facades\Route;

Route::get('/demo', function () {
    return view('preview::form-components-preview');
});
