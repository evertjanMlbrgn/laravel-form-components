### Binding (@bind)

Use the `@bind` directive to bind a model/array to a group of fields so you don’t need to manually set each value.

```blade
@bind($post)
  <x-form-input name="title" />
  <x-form-textarea name="content" />
  <x-form-select name="category_id" :options="$categories" />
@endbind
```

How it works
- The directive uses the package’s `FormDataBinder` to make the bound data available to child components.
- Components use helper traits to resolve the value in this order: `old()` → bound data → provided `default`/`value` prop.

Tips
- Nested fields like `user[name]` are supported. The package normalizes bracket notation to dot notation for lookups.
- You can still override a specific field by passing an explicit `value` or `default` prop.
