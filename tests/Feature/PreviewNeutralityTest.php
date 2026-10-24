<?php
// tests/Feature/PreviewNeutralityTest.php

use Illuminate\Support\Str;

// Bootstrap-only or shell-only markup that must never appear in displayed code snippets.
const PREVIEW_FORBIDDEN_SNIPPET_PATTERNS = [
    '/bootstrap/i',
    '/getbootstrap/i',
    '/\brow g-\d/',
    '/\bcol-(auto|md-\d+|\d+|lg-\d+|sm-\d+)\b/',
    '/\bis-(in)?valid\b/',
    '/\bvisually-hidden\b/',
    '/\bform-control\b/',
    '/class="[^"]*\bform-label\b/',
    '/\bmb-\d\b/',
    '/\bbtn-preview/',
    '/\bmfc-demo-/',
    '/\bmfc-shell-/',
    '/theme_class\(/',
];

function previewCodeSnippets(string $html): array
{
    preg_match_all('#<code class="language-blade">(.*?)</code>#s', $html, $matches);

    return array_map(fn ($snippet) => html_entity_decode($snippet, ENT_QUOTES | ENT_HTML5), $matches[1]);
}

function previewProseWithoutCodeOrChrome(string $html): string
{
    $body = preg_replace('#<head\b.*?</head>#is', '', $html);
    $body = preg_replace('#<select\b.*?</select>#is', '', $body);
    $body = preg_replace('#<script\b.*?</script>#is', '', $body);
    $body = preg_replace('#<style\b.*?</style>#is', '', $body);

    return preg_replace('#<pre\b.*?</pre>#is', '', $body);
}

it('contains no bootstrap-specific classes or links in displayed snippets for any framework', function ($framework) {
    $response = $this->get(route('form-components-preview', ['framework' => $framework]));
    $response->assertOk();

    $snippets = previewCodeSnippets($response->getContent());
    expect($snippets)->not->toBeEmpty();

    foreach ($snippets as $snippet) {
        foreach (PREVIEW_FORBIDDEN_SNIPPET_PATTERNS as $pattern) {
            expect(preg_match($pattern, $snippet))
                ->toBe(0, "Forbidden pattern {$pattern} found in snippet:\n{$snippet}");
        }
    }
})->with(['plain', 'bootstrap-5', 'bootstrap-6', 'tailwind', 'daisyui']);

it('contains no bootstrap wording or getbootstrap links in section prose for any framework', function ($framework) {
    $response = $this->get(route('form-components-preview', ['framework' => $framework]));
    $response->assertOk();

    $prose = previewProseWithoutCodeOrChrome($response->getContent());

    expect(preg_match('/bootstrap/i', $prose))->toBe(0, 'Bootstrap wording found in section prose.')
        ->and(preg_match('/getbootstrap/i', $prose))->toBe(0, 'getbootstrap link found in section prose.');
})->with(['plain', 'bootstrap-5', 'bootstrap-6', 'tailwind', 'daisyui']);

it('covers every public form component in the preview sections', function () {
    $componentsDir = dirname(__DIR__, 2).'/src/View/Components';
    $sectionsDir = dirname(__DIR__, 2).'/resources/views/preview/sections';

    $excluded = ['Assets', 'LocalPackageBadge'];

    $sectionSource = collect(glob($sectionsDir.'/*.blade.php'))
        ->map(fn ($file) => file_get_contents($file))
        ->implode("\n");

    $components = collect(glob($componentsDir.'/*.php'))
        ->map(fn ($file) => basename($file, '.php'))
        ->reject(fn ($name) => in_array($name, $excluded, true));

    expect($components)->not->toBeEmpty();

    foreach ($components as $component) {
        $tag = 'x-form-'.Str::kebab($component);

        expect(preg_match('/<'.preg_quote($tag, '/').'[\s\/>]/', $sectionSource))
            ->toBe(1, "No preview section uses <{$tag}>.");
    }
});
