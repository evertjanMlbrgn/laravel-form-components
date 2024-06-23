{{-- validation form at front, otherwise unreachable field errors
 only testing sample --}}
<x-form-form id="form-input-validation">
    <x-form-input id="checkbox" name="checkbox-validation" type="checkbox" value="1"/>
    <x-form-input id="radio" name="radio-validation" type="radio" value="1"/>
    <x-form-input id="tel" name="tel-validation" type="tel"/>
    <x-form-input id="text" name="text-validation" type="text"/>
    <x-form-submit />
</x-form-form>

<x-form-form id="form-defaults-to-text">
    <x-form-input name="input-text-1" label="Input text" />
    <x-form-input type="text" name="input-text-2" label="Input text 2" />
</x-form-form>

<x-form-form id="form-type-attribute">
    <x-form-input id="button" name="button" type="button"/>
    <x-form-input id="checkbox" name="checkbox" type="checkbox"/>
    <x-form-input id="color" name="color" type="color"/>
    <x-form-input id="date" name="date" type="date"/>
    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local"/>
    <x-form-input id="email" name="email" type="email"/>
    <x-form-input id="file" name="file" type="file"/>
    <x-form-input id="hidden" name="hidden" type="hidden"/>
    <x-form-input id="image" name="image" type="image"/>
    <x-form-input id="month" name="month" type="month"/>
    <x-form-input id="number" name="number" type="number"/>
    <x-form-input id="password" name="password" type="password"/>
    <x-form-input id="radio" name="radio" type="radio"/>
    <x-form-input id="range" name="range" type="range"/>
    <x-form-input id="reset" name="reset" type="reset"/>
    <x-form-input id="search" name="search" type="search"/>
    <x-form-input id="submit" name="submit" type="submit"/>
    <x-form-input id="tel" name="tel" type="tel"/>
    <x-form-input id="text" name="text" type="text"/>
    <x-form-input id="time" name="time" type="time"/>
    <x-form-input id="url" name="url" type="url"/>
    <x-form-input id="week" name="week" type="week"/>
</x-form-form>

<x-form-form id="form-input-validation-error" method="POST">
    <div>
        <x-form-input name="tel" type="tel"/>
    </div>
    <div>
        <x-form-input name="text" type="text" required/>
    </div>
    <div>
        <x-form-input name="checkbox" type="checkbox" required/>
    </div>
    <div>
        <x-form-input name="radio" type="radio" required/>
    </div>
    <x-form-submit />
</x-form-form>

<x-form-form id="form-extra-attributes">
    {{-- NOTE: buttons cannot have the required, readonly attributes, can have disabled--}}
    <x-form-input label="labeltext" required readonly disabled value="test value" id="button" name="button" type="button"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="checkbox" name="checkbox" type="checkbox"/>
    <x-form-input label="labeltext" required="Required" readonly disabled value="test value" id="color" name="color" type="color"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="date" name="date" type="date"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="datetime-local" name="datetime-local" type="datetime-local"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="email" name="email" type="email"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="file" name="file" type="file"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="hidden" name="hidden" type="hidden"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="image" name="image" type="image"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="month" name="month" type="month"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="number" name="number" type="number"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="password" name="password" type="password"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="radio" name="radio" type="radio"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="range" name="range" type="range"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="reset" name="reset" type="reset"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="search" name="search" type="search"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="submit" name="submit" type="submit"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="tel" name="tel" type="tel"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="text" name="text" type="text"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="time" name="time" type="time"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="url" name="url" type="url"/>
    <x-form-input label="labeltext" required readonly disabled value="test value" id="week" name="week" type="week"/>
</x-form-form>

<x-form-form id="form-extra-classes">
    <x-form-input name="button" type="button" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="checkbox" type="checkbox" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="color" type="color" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="date" type="date" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="datetime-local" type="datetime-local" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="email" type="email" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="file" type="file" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="hidden" type="hidden" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="image" type="image" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="month" type="month" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="number" type="number" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="password" type="password" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="radio" type="radio" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="range" type="range" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="reset" type="reset" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="search" type="search" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="submit" type="submit" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="tel" type="tel" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="text" type="text" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="time" type="time" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="url" type="url" class="extra-1 extra-2 form-control-sm"/>
    <x-form-input name="week" type="week" class="extra-1 extra-2 form-control-sm"/>
</x-form-form>

<x-form-form id="form-input-no-id">
    <x-form-input name="button" type="button"/>
    <x-form-input name="checkbox" type="checkbox"/>
    <x-form-input name="color" type="color"/>
    <x-form-input name="date" type="date"/>
    <x-form-input name="datetime-local" type="datetime-local"/>
    <x-form-input name="email" type="email"/>
    <x-form-input name="file" type="file"/>
    <x-form-input name="hidden" type="hidden"/>
    <x-form-input name="image" type="image"/>
    <x-form-input name="month" type="month"/>
    <x-form-input name="number" type="number"/>
    <x-form-input name="password" type="password"/>
    <x-form-input name="radio" type="radio"/>
    <x-form-input name="range" type="range"/>
    <x-form-input name="reset" type="reset"/>
    <x-form-input name="search" type="search"/>
    <x-form-input name="submit" type="submit"/>
    <x-form-input name="tel" type="tel"/>
    <x-form-input name="text" type="text"/>
    <x-form-input name="time" type="time"/>
    <x-form-input name="url" type="url"/>
    <x-form-input name="week" type="week"/>
</x-form-form>

<x-form-form id="form-no-help">
{{--    <x-form-input id="button" name="button" type="button"/>--}}
    <x-form-input id="checkbox" name="checkbox" type="checkbox"/>
    <x-form-input id="color" name="color" type="color"/>
    <x-form-input id="date" name="date" type="date"/>
    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local"/>
    <x-form-input id="email" name="email" type="email"/>
    <x-form-input id="file" name="file" type="file"/>
    <x-form-input id="hidden" name="hidden" type="hidden"/>
    <x-form-input id="image" name="image" type="image"/>
    <x-form-input id="month" name="month" type="month"/>
    <x-form-input id="number" name="number" type="number"/>
    <x-form-input id="password" name="password" type="password"/>
    <x-form-input id="radio" name="radio" type="radio"/>
    <x-form-input id="range" name="range" type="range"/>
{{--    <x-form-input id="reset" name="reset" type="reset"/>--}}
    <x-form-input id="search" name="search" type="search"/>
{{--    <x-form-input id="submit" name="submit" type="submit"/>--}}
    <x-form-input id="tel" name="tel" type="tel"/>
    <x-form-input id="text" name="text" type="text"/>
    <x-form-input id="time" name="time" type="time"/>
    <x-form-input id="url" name="url" type="url"/>
    <x-form-input id="week" name="week" type="week"/>
</x-form-form>

<x-form-form id="form-help-slot">
    <x-form-input id="button" name="button" type="button">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="checkbox" name="checkbox" type="checkbox">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="color" name="color" type="color">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="date" name="date" type="date">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="email" name="email" type="email">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="file" name="file" type="file">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="hidden" name="hidden" type="hidden">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="image" name="image" type="image">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="month" name="month" type="month">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="number" name="number" type="number">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="password" name="password" type="password">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="radio" name="radio" type="radio">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="range" name="range" type="range">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="reset" name="reset" type="reset">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="search" name="search" type="search">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="submit" name="submit" type="submit">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="tel" name="tel" type="tel">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="text" name="text" type="text">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="time" name="time" type="time">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="url" name="url" type="url">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
    <x-form-input id="week" name="week" type="week">
        @slot('help')
            help text by slot
        @endslot
    </x-form-input>
</x-form-form>

<x-form-form id="form-input-help-text">
    <x-form-input id="button" name="button" type="button" help-text="help text by attribute"/>
    <x-form-input id="checkbox" name="checkbox" type="checkbox" help-text="help text by attribute"/>
    <x-form-input id="color" name="color" type="color" help-text="help text by attribute"/>
    <x-form-input id="date" name="date" type="date" help-text="help text by attribute"/>
    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local" help-text="help text by attribute"/>
    <x-form-input id="email" name="email" type="email" help-text="help text by attribute"/>
    <x-form-input id="file" name="file" type="file" help-text="help text by attribute"/>
    <x-form-input id="hidden" name="hidden" type="hidden" help-text="help text by attribute"/>
    <x-form-input id="image" name="image" type="image" help-text="help text by attribute"/>
    <x-form-input id="month" name="month" type="month" help-text="help text by attribute"/>
    <x-form-input id="number" name="number" type="number" help-text="help text by attribute"/>
    <x-form-input id="password" name="password" type="password" help-text="help text by attribute"/>
    <x-form-input id="radio" name="radio" type="radio" help-text="help text by attribute"/>
    <x-form-input id="range" name="range" type="range" help-text="help text by attribute"/>
    <x-form-input id="reset" name="reset" type="reset" help-text="help text by attribute"/>
    <x-form-input id="search" name="search" type="search" help-text="help text by attribute"/>
    <x-form-input id="submit" name="submit" type="submit" help-text="help text by attribute"/>
    <x-form-input id="tel" name="tel" type="tel" help-text="help text by attribute"/>
    <x-form-input id="text" name="text" type="text" help-text="help text by attribute"/>
    <x-form-input id="time" name="time" type="time" help-text="help text by attribute"/>
    <x-form-input id="url" name="url" type="url" help-text="help text by attribute"/>
    <x-form-input id="week" name="week" type="week" help-text="help text by attribute"/>
</x-form-form>

<x-form-form id="form-button-label-by-value-attribute">
    <x-form-input name="button" type="button" value="button label"/>
    <x-form-input name="reset" type="reset" value="button label"/>
    <x-form-input name="submit" type="submit" value="button label"/>
</x-form-form>

<x-form-form id="form-hidden-controls">
    <x-form-input id="button" name="button" type="button" label="test" hidden/>
    <x-form-input id="checkbox" name="checkbox" type="checkbox" label="test" hidden/>
    <x-form-input id="color" name="color" type="color" label="test" hidden/>
    <x-form-input id="date" name="date" type="date" label="test" hidden/>
    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local" label="test" hidden/>
    <x-form-input id="email" name="email" type="email" label="test" hidden/>
    <x-form-input id="file" name="file" type="file" label="test" hidden/>
    <x-form-input id="hidden" name="hidden" type="hidden" label="test" help-text="bla"/>{{-- no need to set hidden attribute --}}
    <x-form-input id="image" name="image" type="image" label="test" hidden/>
    <x-form-input id="month" name="month" type="month" label="test" hidden/>
    <x-form-input id="number" name="number" type="number" label="test" hidden/>
    <x-form-input id="password" name="password" type="password" label="test" hidden/>
    <x-form-input id="radio" name="radio" type="radio" label="test" hidden/>
    <x-form-input id="range" name="range" type="range" label="test" hidden/>
    <x-form-input id="reset" name="reset" type="reset" label="test" hidden/>
    <x-form-input id="search" name="search" type="search" label="test" hidden/>
    <x-form-input id="submit" name="submit" type="submit" label="test" hidden/>
    <x-form-input id="tel" name="tel" type="tel" label="test" hidden/>
    <x-form-input id="text" name="text" type="text" label="test" hidden/>
    <x-form-input id="time" name="time" type="time" label="test" hidden/>
    <x-form-input id="url" name="url" type="url" label="test" hidden/>
    <x-form-input id="week" name="week" type="week" label="test" hidden/>
</x-form-form>

<x-form-form id="form-wrapper-classes">
    <x-form-input name="checkbox" type="checkbox" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="color" type="color" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="date" type="date" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="datetime-local" type="datetime-local" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="email" type="email" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="file" type="file" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="hidden" type="hidden" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="image" type="image" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="month" type="month" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="number" type="number" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="password" type="password" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="radio" type="radio" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="range" type="range" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="search" type="search" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="tel" type="tel" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="text" type="text" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="time" type="time" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="url" type="url" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
    <x-form-input name="week" type="week" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
</x-form-form>

<x-form-form id="form-input-default">
    <x-form-input default="a" name="input" />
</x-form-form>
