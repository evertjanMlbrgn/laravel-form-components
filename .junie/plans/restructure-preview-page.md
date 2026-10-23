---
sessionId: session-261023-001014-hxf6
---

# Requirements

### Overview & Goals
The recent modularization of the form components preview page into a framework-agnostic dashboard was successful in design, but resulted in the loss of numerous specific demonstrations and tests that were present in the original monolithic version. This includes critical components like the HTML Editor (TinyMCE), a comprehensive list of all native input types, standalone button examples, and advanced validation scenarios required for automated testing.

The goal is to restore these missing demonstrations, ensuring the demo page is a complete showcase of the package's capabilities while maintaining the new modular, theme-driven architecture.

### Scope
- **In Scope**:
    - **Restoring Missing Components**: Re-adding HTML Editor (`x-form-html-editor`), standalone Buttons (`x-form-button`), and Submit (`x-form-submit`) examples.
    - **Expanding Existing Sections**: Adding "All native input types" to Controls, more variations to Input Groups (multiple inputs/addons), and advanced Grid/Inline examples to Layout.
    - **Validation Restoration**: Re-implementing comprehensive validation examples, including the "City/State" fields that browser tests depend on.
    - **Binding & Precedence**: Adding clear demonstrations of value precedence (Default vs. Bind vs. Value vs. Old).
- **Out of Scope**:
    - Changing the core logic of the form components.
    - Implementing new frontend frameworks (we stay on Bootstrap 5 for the demo but keep the architecture agnostic).

# Technical Design

### Current Implementation
The preview page is now a modular shell that dynamically loads sections from `resources/views/preview/sections/`. However, the current partials are sparse compared to the previous 1800-line file. Specifically:
- **HTML Editor** is completely missing.
- **Buttons** are only shown as parts of other forms.
- **Input Groups** only show 3 basic examples.
- **Validation** is missing the specific fields and feedback messages used by browser tests.

### Proposed Changes

#### 1. New Documentation Sections
We will add dedicated sections for:
- **HTML Editor**: Showcase `x-form-html-editor` with various configurations (horizontal, floating, custom height).
- **Buttons**: Standalone demonstrations of `x-form-button` and `x-form-submit` with different styles, sizes, and states.

#### 2. Enhanced Existing Sections
- **Controls**: Add a "All Native Input Types" showcase for every HTML5 input type.
- **Input Groups**: Add "Multiple inputs", "Multiple addons", and "Button addons" examples.
- **Layout**: Add Grid-based, Gutter, and Inline form examples.
- **Validation**: Restore the full "City/State" validation demo and add a dedicated "Server-side Validation" example with mock errors.

#### 3. Controller Updates
- Update `DemoController::getSections()` to register the new `html-editor` and `buttons` sections.
- Provide necessary sample data (e.g., mock error bag for validation, initial content for HTML editor).

### File Structure
- `resources/views/preview/sections/html-editor.blade.php` (New)
- `resources/views/preview/sections/buttons.blade.php` (New)
- `resources/views/preview/sections/controls.blade.php` (Updated)
- `resources/views/preview/sections/layout.blade.php` (Updated)
- `resources/views/preview/sections/validation.blade.php` (Updated)
- `resources/views/preview/sections/input-group.blade.php` (Updated)
- `src/Http/Controllers/DemoController.php` (Updated)

# Testing

### Validation Approach
Verification will be done by ensuring all 13+ sections load correctly and match the feature set of the original monolithic file. We will specifically use the existing browser tests (after unskipping them) to verify that TinyMCE and validation feedback are working as expected.

### Key Scenarios
- **TinyMCE Initialization**: Verify the editor loads correctly in the new `html-editor` section.
- **Browser Test Compatibility**: Ensure the "City" field exists with the correct `invalid-feedback` message for the browser test to find.
- **Navigation**: Verify the sidebar correctly navigates to the new sections.

# Delivery Steps

### ✓ Step 1: Restore HTML Editor and Standalone Buttons
Bring back the most prominent missing components.
- Create `html-editor.blade.php` with various configuration examples.
- Create `buttons.blade.php` showcasing `x-form-button` and `x-form-submit` variants.
- Update `DemoController.php` to register these new sections.

### ✓ Step 2: Enhance Controls and Input Groups
Restore the wide variety of input types and group configurations.
- Update `controls.blade.php` with the "All Native Input Types" showcase.
- Expand `input-group.blade.php` with multiple inputs, addons, and button integration.

### ✓ Step 3: Restore Advanced Layouts and Validation
Re-implement complex form structures and automated test requirements.
- Update `layout.blade.php` with Grid, Gutter, and Inline form examples.
- Enhance `validation.blade.php` to include the specific fields (City/State) required by browser tests and add server-side error demos.
- Verify all demonstrations by running the browser test suite.

### * Step 4: Final Parity with Original Demo
Ensure all demonstrations from the original 1800-line file are present in the new architecture.
- Update all sections (Overview, Controls, Select, etc.) with missing variants (sizing, readonly, switches, toggles).
- Restore "Horizontal" and "Inline" layout variations missing from the new Layout section.
- Add advanced floating label examples (textareas, selects).
- Verify all sections for visual consistency and functionality.