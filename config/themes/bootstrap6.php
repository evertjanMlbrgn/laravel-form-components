<?php

$bootstrap5 = require __DIR__.'/bootstrap5.php';

return array_replace($bootstrap5, [
/**
 * Bootstrap 6 specific overrides go here, e.g. 'form_check_switch' => '...'.
 * PROVISIONAL: Bootstrap 6 is unreleased, so every key currently inherits the Bootstrap 5 value.
 * Keys added to bootstrap5.php later are inherited automatically and never fall back to plain.
 */
]);
