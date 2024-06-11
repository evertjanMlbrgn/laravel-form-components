<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Mlbrgn\LaravelFormComponents\Tests\Feature\ActivityModel;

it('supports date casts and custom casts', function () {
    config(['form-components.use_eloquent_date_casting' => true]);

    $this->registerTestRoute('date-time-casts');

    Carbon::setTestNow(Carbon::parse('2021-11-01 12:00:00'));

    ActivityModel::unguard();

    View::share('model', $model = new ActivityModel([
        'date_a' => now(),
        'date_b' => now(),
        'date_c' => now(),
        'date_d' => now(),
        'date_e' => now(),
        'date_f' => now(),
        'date_g' => now(),
    ]));

    if (version_compare(app()->version(), '8.53', '>=')) {
        $model->mergeCasts([
            'date_f' => 'immutable_date:Y',
            'date_g' => 'immutable_datetime:Y-m',
        ]);
    } else {
        $model->mergeCasts([
            'date_f' => 'date:Y',
            'date_g' => 'datetime:Y-m',
        ]);
    }

    $this->visit('/date-time-casts')
        ->seeElement('input[name="date_a"][value="2021-11-01T12:00:00.000000Z"]')
        ->seeElement('input[name="date_b"][value="2021-11-01T00:00:00.000000Z"]')
        ->seeElement('input[name="date_c"][value="2021-11-01T12:00:00.000000Z"]')
        ->seeElement('input[name="date_d"][value="2021"]')
        ->seeElement('input[name="date_e"][value="2021-11"]')
        ->seeElement('input[name="date_f"][value="2021"]')
        ->seeElement('input[name="date_g"][value="2021-11"]');
});
