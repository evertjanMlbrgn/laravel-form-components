@php
    use Mlbrgn\LaravelFormComponents\Tests\Feature\Models\TranslatableModel;$targetA = new TranslatableModel;
    $targetA->setTranslations('input', ['nl' => 'hallo', 'en' => 'hello']);

    $targetB = new TranslatableModel;
    $targetB->setTranslations('output', ['nl' => 'vaarwel', 'en' => 'goodbye']);
@endphp

<x-form-form>
    @bind($targetA)
    <x-form-input name="input" language="nl"/>
    <x-form-input name="output" language="nl" :bind="$targetB"/>

    <x-form-input name="input" language="en"/>
    <x-form-input name="output" language="en" :bind="$targetB"/>

    <x-form-submit/>
    @endbind
</x-form-form>
