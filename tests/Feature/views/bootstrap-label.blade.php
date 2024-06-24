<x-form-form id="form-label-for">
    <x-form-input name="input" label="Input" />
    <x-form-textarea name="textarea" label="Textarea" id="text_b" />
</x-form-form>

<x-form-form id="form-required-controls">
    <x-form-input required label="labeltext" id="button" name="button" type="button"/>
    <x-form-input required label="labeltext" id="checkbox" name="checkbox" type="checkbox"/>
    <x-form-input required label="labeltext" id="color" name="color" type="color"/>
    <x-form-input required label="labeltext" id="date" name="date" type="date"/>
    <x-form-input required label="labeltext" id="datetime-local" name="datetime-local" type="datetime-local"/>
    <x-form-input required label="labeltext" id="email" name="email" type="email"/>
    <x-form-input required label="labeltext" id="file" name="file" type="file"/>
    <x-form-input required label="labeltext" id="hidden" name="hidden" type="hidden"/>
    <x-form-input required label="labeltext" id="image" name="image" type="image"/>
    <x-form-input required label="labeltext" id="month" name="month" type="month"/>
    <x-form-input required label="labeltext" id="number" name="number" type="number"/>
    <x-form-input required label="labeltext" id="password" name="password" type="password"/>
    <x-form-input required label="labeltext" id="radio" name="radio" type="radio"/>
    <x-form-input required label="labeltext" id="range" name="range" type="range"/>
    <x-form-input required label="labeltext" id="reset" name="reset" type="reset"/>
    <x-form-input required label="labeltext" id="search" name="search" type="search"/>
    <x-form-input required label="labeltext" id="submit" name="submit" type="submit"/>
    <x-form-input required label="labeltext" id="tel" name="tel" type="tel"/>
    <x-form-input required label="labeltext" id="text" name="text" type="text"/>
    <x-form-input required label="labeltext" id="time" name="time" type="time"/>
    <x-form-input required label="labeltext" id="url" name="url" type="url"/>
    <x-form-input required label="labeltext" id="week" name="week" type="week"/>

    <x-form-select required label="labeltext" id="select" name="select"/>
    <x-form-checkbox required label="labeltext" id="checkbox-2" name="checkbox-2"/>
    <x-form-radio required label="labeltext" id="radio-2" name="radio-2"/>
    <x-form-textarea required label="labeltext" id="textarea" name="textarea"/>
    <x-form-html-editor required label="labeltext" id="html-editor" name="html-editor"/>
</x-form-form>

<x-form-form id="form-label-for-random-id">
    <x-form-input label="labeltext" type="color"/>
    <x-form-input label="labeltext" type="date"/>
    <x-form-input label="labeltext" type="datetime-local"/>
    <x-form-input label="labeltext" type="email"/>
    <x-form-input label="labeltext" type="file"/>
    <x-form-input label="labeltext" type="hidden"/>
    <x-form-input label="labeltext" type="image"/>
    <x-form-input label="labeltext" type="month"/>
    <x-form-input label="labeltext" type="number"/>
    <x-form-input label="labeltext" type="password"/>
    <x-form-input label="labeltext" type="range"/>
    <x-form-input label="labeltext" type="search"/>
    <x-form-input label="labeltext" type="tel"/>
    <x-form-input label="labeltext" type="text"/>
    <x-form-input label="labeltext" type="time"/>
    <x-form-input label="labeltext" type="url"/>
    <x-form-input label="labeltext" type="week"/>

    {{-- non inputs --}}
    <x-form-select label="labeltext"/>
    <x-form-checkbox label="labeltext"/>
    <x-form-radio label="labeltext"/>
    <x-form-textarea label="labeltext" disabled/>
    <x-form-html-editor label="labeltext" readonly/>
</x-form-form>
