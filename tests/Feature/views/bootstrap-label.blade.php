<x-form-form id="form-label-for">
    <x-form-input name="input" label="Input" />
    <x-form-textarea name="textarea" label="Textarea" id="text_b" />
</x-form-form>

<x-form-form id="form-required-controls">
    <x-form-input required label="label text" id="button" name="button" type="button"/>
    <x-form-input required label="label text" id="checkbox" name="checkbox" type="checkbox"/>
    <x-form-input required label="label text" id="color" name="color" type="color"/>
    <x-form-input required label="label text" id="date" name="date" type="date"/>
    <x-form-input required label="label text" id="datetime-local" name="datetime-local" type="datetime-local"/>
    <x-form-input required label="label text" id="email" name="email" type="email"/>
    <x-form-input required label="label text" id="file" name="file" type="file"/>
    <x-form-input required label="label text" id="hidden" name="hidden" type="hidden"/>
    <x-form-input required label="label text" id="image" name="image" type="image"/>
    <x-form-input required label="label text" id="month" name="month" type="month"/>
    <x-form-input required label="label text" id="number" name="number" type="number"/>
    <x-form-input required label="label text" id="password" name="password" type="password"/>
    <x-form-input required label="label text" id="radio" name="radio" type="radio"/>
    <x-form-input required label="label text" id="range" name="range" type="range"/>
    <x-form-input required label="label text" id="reset" name="reset" type="reset"/>
    <x-form-input required label="label text" id="search" name="search" type="search"/>
    <x-form-input required label="label text" id="submit" name="submit" type="submit"/>
    <x-form-input required label="label text" id="tel" name="tel" type="tel"/>
    <x-form-input required label="label text" id="text" name="text" type="text"/>
    <x-form-input required label="label text" id="time" name="time" type="time"/>
    <x-form-input required label="label text" id="url" name="url" type="url"/>
    <x-form-input required label="label text" id="week" name="week" type="week"/>

    <x-form-select required label="label text" id="select" name="select"/>
    <x-form-checkbox required label="label text" id="checkbox-2" name="checkbox-2"/>
    <x-form-radio required label="label text" id="radio-2" name="radio-2"/>
    <x-form-textarea required label="label text" id="textarea" name="textarea"/>
    <x-form-html-editor required label="label text" id="html-editor" name="html-editor"/>
</x-form-form>

<x-form-form id="form-label-for-random-id">
    <x-form-input label="label text" type="color"/>
    <x-form-input label="label text" type="date"/>
    <x-form-input label="label text" type="datetime-local"/>
    <x-form-input label="label text" type="email"/>
    <x-form-input label="label text" type="file"/>
    <x-form-input label="label text" type="hidden"/>
    <x-form-input label="label text" type="image"/>
    <x-form-input label="label text" type="month"/>
    <x-form-input label="label text" type="number"/>
    <x-form-input label="label text" type="password"/>
    <x-form-input label="label text" type="range"/>
    <x-form-input label="label text" type="search"/>
    <x-form-input label="label text" type="tel"/>
    <x-form-input label="label text" type="text"/>
    <x-form-input label="label text" type="time"/>
    <x-form-input label="label text" type="url"/>
    <x-form-input label="label text" type="week"/>

    {{-- non inputs --}}
    <x-form-select label="label text"/>
    <x-form-checkbox label="label text"/>
    <x-form-radio label="label text"/>
    <x-form-textarea label="label text" disabled/>
    <x-form-html-editor label="label text" readonly/>
</x-form-form>
