<x-form-form id="form-1">
    <x-form-input name="input-text-1" label="Input text" />
    <x-form-input type="text" name="input-text-2" label="Input text 2" />
</x-form-form>

<x-form-form id="form-2">
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
    <x-form-input name="button" type="button" class="extra-1 extra-2"/>
    <x-form-input name="checkbox" type="checkbox" class="extra-1 extra-2"/>
    <x-form-input name="color" type="color" class="extra-1 extra-2"/>
    <x-form-input name="date" type="date" class="extra-1 extra-2"/>
    <x-form-input name="datetime-local" type="datetime-local" class="extra-1 extra-2"/>
    <x-form-input name="email" type="email" class="extra-1 extra-2"/>
    <x-form-input name="file" type="file" class="extra-1 extra-2"/>
    <x-form-input name="hidden" type="hidden" class="extra-1 extra-2"/>
    <x-form-input name="image" type="image" class="extra-1 extra-2"/>
    <x-form-input name="month" type="month" class="extra-1 extra-2"/>
    <x-form-input name="number" type="number" class="extra-1 extra-2"/>
    <x-form-input name="password" type="password" class="extra-1 extra-2"/>
    <x-form-input name="radio" type="radio" class="extra-1 extra-2"/>
    <x-form-input name="range" type="range" class="extra-1 extra-2"/>
    <x-form-input name="reset" type="reset" class="extra-1 extra-2"/>
    <x-form-input name="search" type="search" class="extra-1 extra-2"/>
    <x-form-input name="submit" type="submit" class="extra-1 extra-2"/>
    <x-form-input name="tel" type="tel" class="extra-1 extra-2"/>
    <x-form-input name="text" type="text" class="extra-1 extra-2"/>
    <x-form-input name="time" type="time" class="extra-1 extra-2"/>
    <x-form-input name="url" type="url" class="extra-1 extra-2"/>
    <x-form-input name="week" type="week" class="extra-1 extra-2"/>
</x-form-form>
