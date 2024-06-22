<x-form-form id="form-1">
    <x-form-input name="input-text-1" label="Input text" />
    <x-form-input type="text" name="input-text-2" label="Input text 2" />
</x-form-form>

<x-form-form id="form-2">
    <x-form-input id="button-1" name="button" type="button"/>
    <x-form-input id="checkbox-1" name="checkbox" type="checkbox"/>
    <x-form-input id="color-1" name="color" type="color"/>
    <x-form-input id="date-1" name="date" type="date"/>
    <x-form-input id="datetime-local-1" name="datetime-local" type="datetime-local"/>
    <x-form-input id="email-1" name="email" type="email"/>
    <x-form-input id="file-1" name="file" type="file"/>
    <x-form-input id="hidden-1" name="hidden" type="hidden"/>
    <x-form-input id="image-1" name="image" type="image"/>
    <x-form-input id="month-1" name="month" type="month"/>
    <x-form-input id="number-1" name="number" type="number"/>
    <x-form-input id="password-1" name="password" type="password"/>
    <x-form-input id="radio-1" name="radio" type="radio"/>
    <x-form-input id="range-1" name="range" type="range"/>
    <x-form-input id="reset-1" name="reset" type="reset"/>
    <x-form-input id="search-1" name="search" type="search"/>
    <x-form-input id="submit-1" name="submit" type="submit"/>
    <x-form-input id="tel-1" name="tel" type="tel"/>
    <x-form-input id="text-1" name="text" type="text"/>
    <x-form-input id="time-1" name="time" type="time"/>
    <x-form-input id="url-1" name="url" type="url"/>
    <x-form-input id="week-1" name="week" type="week"/>
</x-form-form>

<x-form-form id="form-3">
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

<x-form-form id="form-4">
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

<x-form-form id="form-5">
    <x-form-input name="button" type="button" value="button label"/>
    <x-form-input name="reset" type="reset" value="button label"/>
    <x-form-input name="submit" type="submit" value="button label"/>
</x-form-form>

<x-form-form id="form-6">
    <x-form-input id="button" name="button" type="button" label="test" hidden/>
    <x-form-input id="checkbox" name="checkbox" type="checkbox" label="test" hidden/>
    <x-form-input id="color" name="color" type="color" label="test" hidden/>
    <x-form-input id="date" name="date" type="date" label="test" hidden/>
    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local" label="test" hidden/>
    <x-form-input id="email" name="email" type="email" label="test" hidden/>
    <x-form-input id="file" name="file" type="file" label="test" hidden/>
    <x-form-input id="hidden" name="hidden" type="hidden" label="test"/>{{-- no need to set hidden attribute --}}
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

<x-form-form id="form-7">
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

<x-form-form id="form-default">
    <x-form-input default="a" name="input" />
</x-form-form>