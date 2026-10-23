<?php

beforeEach(function () {
    config(['form-components.framework' => 'bootstrap-5']);
});

it('renders bootstrap 5 classes by default when configured', function () {
    $view = $this->blade('<x-form-input name="test" label="My Label" />');
    
    $view->assertSee('form-control');
    $view->assertSee('form-label');
    $view->assertDontSee('mfc-input');
});

it('respects bootstrap 5 specific structural flags', function () {
    // BS5 by default has use_group_wrapper => false
    $view = $this->blade('<x-form-input name="test" />');
    $view->assertDontSee('mb-3');
    
    config(['form-components.themes.bootstrap-5.use_group_wrapper' => true]);
    $view = $this->blade('<x-form-input name="test" />');
    $view->assertSee('mb-3');
});
