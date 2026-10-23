---
sessionId: session-261022-232743-obri
---

# Requirements

### Overview & Goals
Transition `laravel-form-components` from a Bootstrap-coupled implementation to a **theme-driven architecture**. This will allow the package to support multiple frontend frameworks (Bootstrap 5, Bootstrap 6, Tailwind, etc.) with minimal effort and without duplicating code.

### Scope
- **In Scope**:
    - Centralizing CSS class definitions into a configuration-based theme map.
    - Extracting layout logic (horizontal, floating, margins) into reusable layout components.
    - Refactoring all existing Blade components to be "headless" (class-agnostic).
    - Establishing a migration path for a major version upgrade (v2.0.0).
- **Out of Scope**:
    - Changing core form logic like data binding or validation handling.
    - Implementing specific Tailwind or Bootstrap 6 logic beyond class mapping.

### Functional Requirements
- Support switching between frameworks via a single config value.
- Maintain existing functionality (horizontal layouts, floating labels, validation feedback).
- Provide a clean way to override specific theme classes per application.
- Significantly reduce the complexity and size of primary component templates (e.g., `input.blade.php`).

# Technical Design

### Current Implementation
The current implementation hardcodes Bootstrap 5 classes directly in Blade templates. Large files like `input.blade.php` (200 lines) mix layout logic with input rendering, making it difficult to support other frameworks without duplicating the entire file structure.

### Key Decisions
- **Centralized Theme Registry**: Use a singleton `Theme` class to resolve classes. This avoids repeated `config('form-components.themes...')` calls and allows for future extensions (like dynamic class generators).
- **Component Decomposition**: Break down large components into smaller primitives:
    - `<x-form-group>`: Handles the outer container and layout mode.
    - `<x-form-input-wrapper>`: Handles internal column layout.
- **Theme-First Helpers**: Use a `theme_class()` helper in Blade to keep templates clean and readable.

### Proposed Changes

#### Theme Map Configuration
A new structure in `config/form-components.php`:
```php
'framework' => 'bootstrap-5',
'themes' => [
    'bootstrap-5' => [
        'input' => 'form-control',
        'input_invalid' => 'is-invalid',
        'label' => 'form-label',
        'label_horizontal' => 'col-form-label',
        'wrapper_horizontal' => 'row',
        'wrapper_floating' => 'form-floating',
        // ...
    ],
]
```

#### New Layout Components
- **FormGroup**: Logic currently at the top/bottom of `input.blade.php`.
- **FormInputWrapper**: Logic handling the `col-8` wrapper in horizontal layouts.

#### Component Refactoring (Example)
Old `input.blade.php`:
```blade
<div {{ $attributes->onlyWrapperClasses()->class(['row' => $horizontal]) }}>
    <label class="form-label">...</label>
    <div class="col-8">
        <input class="form-control">
    </div>
</div>
```
New `input.blade.php`:
```blade
<x-form-group :horizontal="$horizontal" :attributes="$attributes->onlyWrapperClasses()">
    <x-form-label :horizontal="$horizontal">...</x-form-label>
    <x-form-input-wrapper :horizontal="$horizontal">
        <input {{ $attributes->exceptWrapperClasses()->class([theme_class('input')]) }}>
        <x-form-errors :name="$name" />
    </x-form-input-wrapper>
</x-form-group>
```

### File Structure
- `src/Theme/Theme.php`: Core class resolution logic.
- `src/View/Components/Layout/`: Directory for new internal layout components.
- `Helpers/helpers.php`: Addition of `theme_class()` helper.
- `resources/views/components/`: Updated templates for all form elements.

# Testing

### Validation Approach
Verification will focus on ensuring visual parity for Bootstrap 5 while demonstrating framework flexibility.

### Key Scenarios
- **Regression Test (BS5)**: Verify that generated HTML for standard, horizontal, and floating layouts matches the current output exactly (excluding minor whitespace changes).
- **Theme Switch**: Switch config to a "mock" theme and verify that all classes update accordingly across all components.
- **Overriding**: Verify that `attributes->class()` merging still works correctly alongside theme classes.

### Test Changes
- Add unit tests for the `Theme` class to ensure correct resolution and fallbacks.
- Update existing component tests to verify the new rendered structure.

# Delivery Steps

### ✓ Step 1: Initialize Theme Management System
Initialize the theme management system and integrate it into the package.

- Create `src/Theme/Theme.php` to handle class resolution from configuration.
- Update `FormComponentsServiceProvider.php` to register the `Theme` class as a singleton.
- Add the `theme_class()` helper to `Helpers/helpers.php` for easy access in Blade templates.
- Define the initial `themes` configuration structure in `config/config.php` with Bootstrap 5 mappings.

### ✓ Step 2: Implement Layout Components
Create the foundation for a modular layout by extracting common wrapping logic.

- Create `FormGroup` component (`src/View/Components/Layout/FormGroup.php` and Blade view) to handle outer wrappers, margins, and layout modes (horizontal/floating).
- Create `FormInputWrapper` component to handle internal layout columns for horizontal forms.
- Update `FormComponentsServiceProvider` to register these new internal layout components.

### ✓ Step 3: Refactor Input and Base Components
Refactor the most complex component and its dependencies to use the new architecture.

- Rewrite `resources/views/components/input.blade.php` to use the new `x-form-group` and `x-form-input-wrapper` components.
- Update `Label.blade.php`, `Errors.blade.php`, and `Text.blade.php` to resolve their classes via `theme_class()`.
- Refactor the margin-filtering macros in `FormComponentsServiceProvider` to be framework-agnostic if possible.

### ✓ Step 4: Apply Theme System to Remaining Components
Apply the theme system to all remaining form elements.

- Refactor `Select`, `Textarea`, `Checkbox`, `Radio`, and `Button` components to use the `Theme` class.
- Standardize feedback messaging (valid/invalid feedback) across all components.
- Ensure consistent handling of `floating` and `horizontal` properties across the entire suite.

### ✓ Step 5: Finalize Breaking Change and Documentation
Finalize the transition and provide upgrade paths for existing users.

- Create a comprehensive migration guide detailing config changes and view updates.
- Document how to add support for new frameworks like Bootstrap 6 or Tailwind.
- Finalize the major version release plan (v2.0.0).