<?php /** @noinspection Annotator */

use Illuminate\Http\Request;

it('binds a target to the form', function () {
    $this->registerTestRoute('bind-target');

    $this->visit('/bind-target')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'b')
        ->seeElement('option[value="c"]:selected')
        ->seeElement('select[multiple]')
        ->seeElement('option[value="d"]:selected')
        ->seeElement('option[value="e"]:selected')
        ->seeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});

it('sets the right value if the value is zero', function () {
    $this->registerTestRoute('bind-target-zero-value');

    $this->visit('/bind-target-zero-value')
        ->seeElement('input[name="input"][value="0"]');
});

it('binds two targets to the form', function () {
    $this->registerTestRoute('bind-two-targets');

    $this->visit('/bind-two-targets')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'e')
        ->dontSeeElement('option[value="c"]:selected')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});

it('overrides the bound target with the old request data', function () {
    $this->registerTestRoute('bind-with-validation-errors', function (Request $request) {
        $request->validate([
            'input' => 'required',
            'textarea' => 'required',
            'select' => 'required',
            'checkbox' => 'required',
            'radio' => 'required',
        ]);
    });

    $this->visit('/bind-with-validation-errors')
        ->type('d', 'input')
        ->type('e', 'textarea')
        ->type('f', 'html-editor')
        ->select('f', 'select')
        ->uncheck('checkbox')
        ->check('radio')
        ->press('Send')
        ->seeElement('input[name="input"][value="d"]')
        ->seeInElement('textarea[name="textarea"]', 'e')
        ->seeInElement('textarea[name="html-editor"]', 'f')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});

it('handles old nested data', function () {
    $this->registerTestRoute('bind-nested-validation-errors', function (Request $request) {
        $request->validate([
            'input.nested' => 'required',
            'textarea.nested' => 'required',
            'select.nested' => 'required',
            'checkbox.nested' => 'required',
            'radio.nested' => 'required',
        ]);
    });

    $this->visit('/bind-nested-validation-errors')
        ->type('d', 'input[nested]')
        ->type('e', 'textarea[nested]')
        ->select('f', 'select[nested]')
        ->uncheck('checkbox[nested]')
        ->check('radio[nested]')
        ->press('Send')
        ->seeElement('input[name="input[nested]"][value="d"]')
        ->seeInElement('textarea[name="textarea[nested]"]', 'e')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox[nested]"]')
        ->dontSeeElement('input[name="checkbox[nested]"]:checked')
        ->seeElement('input[name="radio[nested]"]:checked');
});

it('overrides the default value', function () {
    $this->registerTestRoute('bind-default-values-with-bound-target');

    $this->visit('/bind-default-values-with-bound-target')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'b')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]')
        ->dontSeeElement('input[name="radio"]:checked');
});

it('overrides the default value when nested', function () {
    $this->registerTestRoute('bind-default-values-with-nested-bound-target');

    $this->visit('/bind-default-values-with-nested-bound-target')
        ->seeElement('input[name="nested[input]"][value="a"]')
        ->seeInElement('textarea[name="nested[textarea]"]', 'b')
        ->seeElement('select[name="nested[select]"] > option[value="f"]:selected')
        ->seeElement('input[name="nested[checkbox]"]')
        ->dontSeeElement('input[name="nested[checkbox]"]:checked')
        ->seeElement('input[name="nested[radio]"]')
        ->dontSeeElement('input[name="nested[radio]"]:checked');
});

it('overrides the global bind with a bind per element', function () {
    $this->registerTestRoute('bind-override');

    $this->visit('/bind-override')
        ->seeElement('input[name="input"][value="d"]')
        ->seeInElement('textarea[name="textarea"]', 'e')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]')
        ->dontSeeElement('input[name="radio"]:checked');
});

it('disables a global bind per element', function () {
    $this->registerTestRoute('undo-bind');

    $this->visit('/undo-bind')
        ->seeElement('input[name="input"][value="a"]')
        ->dontSeeInElement('textarea[name="textarea"]', 'b');
});
