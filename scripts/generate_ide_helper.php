#!/usr/bin/env php
<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Blade;
use Mlbrgn\LaravelFormComponents\Providers\FormComponentsServiceProvider;

require __DIR__ . '/../vendor/autoload.php';

$outputPath = __DIR__ . '/../resources/_ide_helper_components.php';

// Load default package config (no Laravel runtime)
$packageConfig = require __DIR__ . '/../config/config.php';
$prefix = $packageConfig['tag_prefix'] ?? 'form';

// Grab components from the service provider
$components = FormComponentsServiceProvider::$components ?? [];

if (empty($components)) {
    echo "No components found in FormComponentsServiceProvider.\n";
    exit(1);
}

// Remove internal-only components
unset($components['assets']); // Assets component is internal only

// Sort class names alphabetically for neatness
$classList = array_map(fn($c) => ltrim($c, '\\'), $components);
sort($classList);

// Generate `use` imports (class basenames)
$classImports = implode(",\n    ", array_map(fn($fqn) => class_basename($fqn), $classList));

// Generate Blade registrations using configured prefix only
$registrations = [];
foreach ($components as $tag => $class) {
    $registrations[] = sprintf("Blade::component('%s-%s', %s::class);", $prefix, $tag, $class);
}

$registrationsString = implode("\n", $registrations);

// Generate final PHP file content
$content = <<<PHP
<?php
/**
 * IDE Helper for Laravel Form Components
 *
 * This file exists solely to help IDEs recognize Blade components
 * provided by the mlbrgn-laravel-form-components package.
 *
 * This file is NOT loaded at runtime.
 *
 * Regeneration:
 * Run: php scripts/generate_ide_helper.php
 * It reads the component list from FormComponentsServiceProvider::\$components
 */

use Mlbrgn\LaravelFormComponents\View\Components\{
    {$classImports}
};
use Illuminate\Support\Facades\Blade;

// Explicit Blade component registration for IDE autocompletion
{$registrationsString}

PHP;

// Write to file
file_put_contents($outputPath, $content);

echo "IDE helper generated at {$outputPath}\n";

//use Illuminate\Support\Facades\Blade;
//use Mlbrgn\LaravelFormComponents\Providers\FormComponentsServiceProvider;
//
//require __DIR__ . '/../vendor/autoload.php';
//
//$outputPath = __DIR__ . '/../resources/_ide_helper_components.php';
//
//// Load default package config
//$packageConfig = require __DIR__ . '/../config/config.php';
//$prefix = $packageConfig['tag_prefix'] ?? 'form';
//
//// Make sure $components array exists in service provider
//$components = FormComponentsServiceProvider::$components ?? [];
//
//if (empty($components)) {
//    echo "No components found in FormComponentsServiceProvider.\n";
//    exit(1);
//}
//
//// Sort classes alphabetically
//$classList = array_map(fn($c) => ltrim($c, '\\'), $components);
//sort($classList);
//
//// Generate use statements
//$classImports = implode(",\n    ", array_map(fn($fqn) => class_basename($fqn), $classList));
//
//// Blade registrations: host-facing and internal
//$registrations = [];
//foreach ($components as $tag => $class) {
//    // host-facing
//    $registrations[] = sprintf("Blade::component('%s-%s', %s::class);", $prefix, $tag, $class);
//    // internal
//    $registrations[] = sprintf("Blade::component('mlbrgn-%s', %s::class);", $tag, $class);
//}
//
//// implode registrations
//$registrationsString = implode("\n", $registrations);
//
//// Generate PHP content
//$content = <<<PHP
//<?php
///**
// * IDE Helper for Laravel Form Components
// *
// * This file exists solely to help IDEs recognize Blade components
// * provided by the mlbrgn-laravel-form-components package.
// *
// * This file is NOT loaded at runtime.
// */
//
//use Mlbrgn\LaravelFormComponents\View\Components\{
//    {$classImports}
//};
//use Illuminate\Support\Facades\Blade;
//
//// Explicit Blade component registration for IDE autocompletion
//{$registrationsString}
//
//PHP;
//
//// Write file
//file_put_contents($outputPath, $content);
//
//echo "✅ IDE helper generated at {$outputPath}\n";

//declare(strict_types=1);
//
///**
// * This script generates the _ide_helper_components.php file
// * for IDE autocompletion of Blade components.
// *
// * Usage:
// *   php scripts/generate_ide_helper.php
// *
// * This file is NOT loaded at runtime.
// */
//
//use Illuminate\Support\Facades\Blade;
//use Mlbrgn\LaravelFormComponents\Providers\FormComponentsServiceProvider;
//
//require __DIR__ . '/../vendor/autoload.php';
//
//$outputPath = __DIR__ . '/../resources/_ide_helper_components.php';
//
//// Grab components from the service provider
//$components = FormComponentsServiceProvider::$components;
//
//if (empty($components)) {
//    echo "No components found in FormComponentsServiceProvider.\n";
//    exit(1);
//}
//
//// Strip leading backslashes and sort alphabetically by class
//$classList = array_map(fn($c) => ltrim($c, '\\'), $components);
//sort($classList);
//
//// Prepare grouped import statement
//$classImports = implode(",\n    ", array_map(fn($fqn) => class_basename($fqn), $classList));
//
//// Prepare Blade registrations using configured tag_prefix
//$prefix = 'form'; // default, or could read from config if host app is available
//$registrations = implode("\n", array_map(
//    fn($tag, $class) => sprintf("Blade::component('%s-%s', %s::class);", $prefix, $tag, $class),
//    array_keys($components),
//    $components
//));
//
//$content = <<<PHP
//<?php
///**
// * IDE Helper for Laravel Form Components
// *
// * This file exists solely to help IDEs (PhpStorm, VS Code) recognise
// * the Blade components provided by the mlbrgn-laravel-form-components package.
// *
// * This file is NOT loaded at runtime.
// *
// * Regeneration:
// * Run: php scripts/generate_ide_helper.php
// * It reads the component list from FormComponentsServiceProvider::\$components
// */
//
//use Mlbrgn\LaravelFormComponents\View\Components\{
//    {$classImports}
//};
//use Illuminate\Support\Facades\Blade;
//
//// Explicit Blade component registration for IDE autocompletion
//{$registrations}
//
//PHP;
//
//// Write file
//file_put_contents($outputPath, $content);
//
//echo "IDE helper generated at {$outputPath}\n";
