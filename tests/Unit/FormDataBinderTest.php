<?php

use Mlbrgn\LaravelFormComponents\Helpers\FormDataBinder;

it('can bind targets', function () {
    $binder = new FormDataBinder;
    expect($binder->get())->toBeNull();

    $binder->bind($array = ['foo' => 'bar']);
    expect($binder->get())->toEqual($array);
});

it('can bind multiple targets', function () {
    $binder = new FormDataBinder;

    $binder->bind($targetA = ['foo' => 'bar']);
    $binder->bind($targetB = ['bar' => 'foo']);

    expect($binder->get())->toEqual($targetB);
    $binder->pop();

    expect($binder->get())->toEqual($targetA);
    $binder->pop();

    expect($binder->get())->toBeNull();
});
