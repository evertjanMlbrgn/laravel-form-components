<?php

namespace Mlbrgn\LaravelFormComponents\Traits;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    // value precedence:
    // 1. old data
    // 2. bind attribute (if false, no bind, so step 3 will be skipped)
    // 3. bind directive
    // 4. value attribute (from value attribute)
    // 5. default attribute (from default attribute)

    private function setValue(
        string $value = null,// from attribute
        string $name,// from attribute
        $bind = null,// from attribute
        $default = null,// from attribute
        $language = null// from attribute
    ) {
        $inputName = static::convertBracketsToDots($name);

        if (! $language) {
            $this->value = old($inputName, $this->getBoundValue($bind, $inputName) ?? $value ?? $default);
        } else {

            // if individual control has non-false bind (attribute value)
            if ($bind !== false) {
                // if bind is truthy bind stays bind provided by attribute
                // otherwise we get the binding the control is wrapped in
                $bind = $bind ?: $this->getBoundTarget();
                echo 'bind on control found';
            }

            if ($bind) {
                $default = $bind->getTranslation($name, $language, false) ?: $value ?? $default;
            }

            $this->value = old("{$inputName}.{$language}", $default);
        }
    }
}
