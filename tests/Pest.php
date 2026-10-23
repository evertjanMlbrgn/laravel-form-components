<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// use Tests\TestCase;

use Mlbrgn\LaravelFormComponents\Tests\TestCase;
use Mlbrgn\LaravelFormComponents\Tests\BrowserTestCase;
use Illuminate\Testing\TestResponse;
use Symfony\Component\DomCrawler\Crawler;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->in('Feature', 'Unit');
uses(BrowserTestCase::class)->group('browser')->in('Browser');

pest()->browser()->timeout(5000); // @ai: do not change the timeout value

if (getenv('PEST_BROWSER_HEADED')) {
    pest()->browser()->headed();
}

expect()->extend('toContainElement', function (string $selector, array $attributes = []) {
    $crawler = new Crawler($this->value->getContent());
    $element = $crawler->filter($selector);

    Assert::assertGreaterThan(0, $element->count(), "Element [{$selector}] not found.");

    foreach ($attributes as $attribute => $value) {
        Assert::assertEquals($value, $element->attr($attribute), "Attribute [{$attribute}] does not match.");
    }

    return $this;
});

TestResponse::macro('assertSeeElement', function (string $selector, array $attributes = []) {
    $crawler = new Crawler($this->getContent());

    $effectiveSelector = preg_replace('/:selected\b/', '[selected]', $selector);
    $effectiveSelector = preg_replace('/:checked\b/', '[checked]', $effectiveSelector);

    $elements = $crawler->filter($effectiveSelector);

    Assert::assertGreaterThan(0, $elements->count(), "Element [{$selector}] not found.");

    foreach ($attributes as $attribute => $value) {
        $actualValue = $elements->attr($attribute);
        if ($attribute === 'class') {
            Assert::assertStringContainsString($value, $actualValue, "Class [{$value}] not found in [{$actualValue}]");
        } else {
            Assert::assertEquals($value, $actualValue, "Attribute [{$attribute}] does not match.");
        }
    }

    return $this;
});

TestResponse::macro('assertSeeInElement', function (string $selector, string $text) {
    $crawler = new Crawler($this->getContent());
    $element = $crawler->filter($selector);

    Assert::assertGreaterThan(0, $element->count(), "Element [{$selector}] not found.");
    Assert::assertStringContainsString($text, $element->text(), "Text [{$text}] not found in element [{$selector}].");

    return $this;
});

TestResponse::macro('assertDontSeeInElement', function (string $selector, string $text) {
    $crawler = new Crawler($this->getContent());
    $element = $crawler->filter($selector);

    if ($element->count() > 0) {
        Assert::assertStringNotContainsString($text, $element->text(), "Text [{$text}] was found in element [{$selector}].");
    }

    return $this;
});

TestResponse::macro('assertSeeText', function (string $text) {
    Assert::assertStringContainsString($text, strip_tags($this->getContent()), "Text [{$text}] not found in page.");
    return $this;
});

TestResponse::macro('assertDontSeeText', function (string $text) {
    Assert::assertStringNotContainsString($text, strip_tags($this->getContent()), "Text [{$text}] was found in page.");
    return $this;
});

TestResponse::macro('crawler', function () {
    return new Crawler($this->getContent());
});

TestResponse::macro('assertSeeElementCount', function (string $selector, int $count) {
    $crawler = new Crawler($this->getContent());
    Assert::assertEquals($count, $crawler->filter($selector)->count(), "Element [{$selector}] count [{$count}] does not match.");
    return $this;
});

TestResponse::macro('assertDontSeeElement', function (string $selector, array $attributes = []) {
    $crawler = new Crawler($this->getContent());

    $effectiveSelector = preg_replace('/:selected\b/', '[selected]', $selector);
    $effectiveSelector = preg_replace('/:checked\b/', '[checked]', $effectiveSelector);

    Assert::assertEquals(0, $crawler->filter($effectiveSelector)->count(), "Element [{$selector}] was found.");
    return $this;
});

TestResponse::macro('within', function (string $selector, callable $callback) {
    $crawler = new Crawler($this->getContent());
    $subCrawler = $crawler->filter($selector);

    Assert::assertGreaterThan(0, $subCrawler->count(), "Element [{$selector}] not found.");

    $callback(new class($subCrawler->outerHtml()) extends TestResponse {
        public function __construct($content) {
            $this->baseResponse = new \Illuminate\Http\Response($content);
        }
    });

    return $this;
});

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/
