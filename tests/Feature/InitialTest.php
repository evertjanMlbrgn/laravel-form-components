<?php

uses(\Orchestra\Testbench\TestCase::class);
test('first', function () {
    expect(true)->toBeTrue();
    expect(3 > 2)->toBeTrue();
});
