### Components reference

All components use the tag prefix from `config('form-components.tag_prefix')`. Default is `form`, so tags are like `<x-form-input />`.

Available components (public aliases):
- `<x-form-form />`
- `<x-form-group />`
- `<x-form-label />`
- `<x-form-input />`
- `<x-form-textarea />`
- `<x-form-select />`
- `<x-form-checkbox />`
- `<x-form-radio />`
- `<x-form-button />`
- `<x-form-submit />`
- `<x-form-errors />`
- `<x-form-html-editor />`
- `<x-form-recaptcha-v2 />`

There are also internal namespaced components used by the package itself like `<x-mlbrgn-form-components::assets />` and `<x-mlbrgn-form-components::text />`.

#### <x-form-form>
Props:
- `method` (string, default `POST`)
- `validationMode` (`server` | `client-default` | `client-custom`)

Behavior:
- Adds CSRF token for non-GET methods
- Spoofs methods for `PUT`, `PATCH`, `DELETE`
- Controls client-side validation assets with `validationMode`

Example:
```blade
<x-form-form action="..." method="POST" validationMode="client-custom" class="needs-validation">
  {{ $slot }}
</x-form-form>
```

#### <x-form-group>
Props:
- `name` (string) used for error lookup if provided
- `label` (string)
- `inline` (bool) for inline groups
- `validFeedback`, `invalidFeedback` (string)
- `tooltipFeedback` (bool)
- `helpText` (string)

Use to wrap a label, control, and messages consistently.

#### <x-form-label>
Standard Bootstrap 5 label with required indicator support when the control has `required`.

#### <x-form-input>
Props:
- `name` (string)
- `type` (string, default `text`)
- `label` (string)
- `horizontal`, `floating`, `hidden` (bool)
- `validFeedback`, `invalidFeedback`, `tooltipFeedback`, `helpText` (string/bool)
- `bind`, `default`, `language`, `value`

Shows server-side errors and client feedback classes automatically.

#### <x-form-textarea>
Same API as input (excluding `type`). Supports `rows`, `cols`, etc. via attributes.

#### <x-form-select>
Props:
- `name`, `label`
- `options` (array/Arrayable)
- `multiple` (bool)
- `manyRelation` (bool)
- `placeholder`, `placeholderValue`
- `floating`, `horizontal`, `hidden`
- `validFeedback`, `invalidFeedback`, `tooltipFeedback`, `helpText`

Helper methods handle selection state and error highlighting.

#### <x-form-checkbox> / <x-form-radio>
Standard controls with error display support. Pass `name`, `value`, and slot content for the label.

#### <x-form-errors>
Props:
- `name` (string, required)
- `bag` (string, default `default`)

Renders validation messages for the field.

#### <x-form-button> and <x-form-submit>
Use for actions. Support standard button attributes and Bootstrap classes.

#### <x-form-html-editor>
See HTML Editor page. Key props:
- `name`, `label`
- `tinymce-config` (array|JSON string)
- `extraFormData` (array)
- Layout flags: `horizontal`, `floating`, `hidden`

#### <x-form-recaptcha-v2>
See reCAPTCHA v2 page. Props:
- `formId` (string) the form element ID to hook submit
- `classButton` (string) Bootstrap class for the rendered button
- `label` (string) button label
