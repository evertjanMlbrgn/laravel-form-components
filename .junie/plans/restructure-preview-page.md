---
sessionId: session-261023-001014-hxf6
---

# Requirements

### Overview & Goals
The current `form-components-preview.blade.php` is a monolithic 1400+ line file that serves both as a demo page and a dump for internal tests. This makes it difficult to maintain and less useful for developers who want to learn how to use the components.

The goal is to restructure the preview page into a modular, documentation-style dashboard that is **framework-agnostic**. The demo page should look and function correctly whether the user is using Bootstrap 5, Tailwind CSS, or any other supported framework by adapting its structure and styles dynamically. While Bootstrap 5 is currently the primary supported framework, the plan ensures that adding support for Tailwind CSS or Bulma is a matter of configuration rather than code changes.

### Scope
- **In Scope**:
    - **Framework Abstraction**: Moving all preview-specific CSS classes and structural rules (like wrappers) into the theme configuration.
    - **Modularization**: Splitting the large view into logical partials.
    - **Code Visibility**: Adding syntax-highlighted code blocks to every example.
    - **Controller Logic**: Moving all data preparation from the view to `DemoController`.
    - **Navigation**: Improving the sidebar and overall page layout using theme-agnostic components.
- **Out of Scope**:
    - Changes to core form component logic (except for structural abstraction).
    - Persistence logic for the demo (no real database saving).

# Technical Design

### Current Implementation
The current preview page is a single Blade template that:
- Hardcodes many examples directly.
- Uses large `@php` blocks to define options and flash session data (which is brittle).
- Lacks a way for developers to see the source code for the examples they are viewing.
- Mixes basic "how-to" examples with complex "value precedence" and "hidden control" tests.

### Proposed Changes

#### 1. Framework Abstraction Layer
We will move from hardcoded Bootstrap classes to a fully theme-driven architecture for both components and the preview UI:
- **Structural Flags**: Add flags to `config/config.php` (e.g., `use_group_wrapper => true`) to handle differences like Bootstrap's required `mb-3` wrappers vs. Tailwind's flat structure.
- **Layout Adapters**: Refactor `layout.form-group` and `layout.form-input-wrapper` to act as adapters. They will conditionally render wrapping HTML based on the active framework's requirements.
- **Preview Theme Keys**: Extend the `themes` configuration with keys for the preview interface (e.g., `preview_container`, `preview_sidebar`, `preview_section_title`).

#### 2. Architecture Refactoring
We will move to a partial-based architecture:
- **Shell**: `form-components-preview.blade.php` will only contain the layout shell, using the new preview theme keys.
- **Sections**: Each section (Inputs, Layouts, Validation, etc.) will live in its own file under `resources/views/preview/sections/`.
- **Data**: `DemoController` will return an array of sections and their corresponding data, keeping the views clean of logic.

#### 3. Enhanced Preview Components
We will update the preview-specific components in `resources/views/components/preview/components/`:
- **`example.blade.php`**: Will now support a `code` slot and use theme-resolved classes for its own container.
- **Syntax Highlighting**: We will include Highlight.js in the preview shell to make the code snippets readable.

#### 4. Clean Environment & Logic
- All `select` options and icons will be moved to the `DemoController`.
- We will add a "Form Submission Feedback" area that shows the submitted data (JSON) when a demo form is "submitted".

### File Structure
- `config/config.php` (Updated with structural flags and preview keys)
- `src/Http/Controllers/DemoController.php` (Updated)
- `resources/views/preview/form-components-preview.blade.php` (Refactored)
- `resources/views/preview/sections/*.blade.php` (New partials)
- `resources/views/components/layout/form-group.blade.php` (Refactored as adapter)
- `resources/views/components/layout/form-input-wrapper.blade.php` (Refactored as adapter)

# Testing

### Validation Approach
Verification will be done manually by visiting the `/form-components-preview` route and ensuring all sections load correctly and look better than before.

### Key Scenarios
- **Framework Adaptation**: Ensure that changing `FORM_COMPONENTS_FRAMEWORK` to a future framework (e.g., Tailwind) would correctly alter the preview page layout and component structure.
- **Navigation**: Ensure the sidebar links correctly scroll to the partial-driven sections.
- **Code Visibility**: Verify that clicking "Show Code" reveals the correct Blade syntax.
- **Responsiveness**: Ensure the new sidebar and layout work well across devices.

### Edge Cases
- **TinyMCE Load**: Ensure that splitting the view doesn't break the TinyMCE initialization (which relies on specific IDs).
- **Session State**: Verify that the "Value Precedence" example doesn't pollute the session for other examples on the page.

# Delivery Steps

### ✓ Step 1: Implement Framework Abstraction and Config Update
Establish the infrastructure for framework-agnostic rendering.
- Update `config/config.php` with structural flags (e.g., `use_group_wrapper`) and preview UI theme keys.
- Refactor `layout.form-group.blade.php` and `layout.form-input-wrapper.blade.php` to use these flags for conditional wrapping.
- Update `Theme.php` if necessary to support boolean flag resolution.

### ✓ Step 2: Refactor Preview Shell and Controller
Prepare the documentation-style dashboard shell.
- Update `DemoController.php` to provide section metadata and framework-agnostic sample data.
- Refactor `form-components-preview.blade.php` into a theme-driven layout shell with a dynamic sidebar.
- Move internal CSS to theme-resolved styles or structured blocks.

### ✓ Step 3: Modularize Preview Sections and 'Show Code'
Break the monolithic file and implement syntax highlighting.
- Extract all form examples into modular partials in `resources/views/preview/sections/`.
- Enhance `x-form::preview.components.example` with a `code` slot and integrate Highlight.js.
- Ensure all partials are fully responsive to framework changes.

### ✓ Step 4: Polish and Add Advanced Examples
Final touches for a high-quality developer experience.
- Add a "Real World" section with a complete form example and submission feedback.
- Add "Copy to Clipboard" functionality for code snippets.
- Verify that the layout remains consistent when switching framework themes.