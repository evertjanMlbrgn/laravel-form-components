<?php

namespace Mlbrgn\LaravelFormComponents\Tests;

use Illuminate\Testing\TestResponse;
use Symfony\Component\DomCrawler\Crawler;

trait InteractsWithForms
{
    /** @var TestResponse */
    protected $response;

    protected array $inputs = [];

    public function visitPath(array|string $uri, array $options = [])
    {
        // dd('Legacy visit called');
        if (is_array($uri)) {
            $uri = $uri[0];
        }
        $this->response = $this->get($uri);
        $this->inputs = [];
        return $this;
    }

    public function type($value, $name)
    {
        $this->inputs[$name] = $value;
        return $this;
    }

    public function check($name)
    {
        $this->inputs[$name] = '1';
        return $this;
    }

    public function uncheck($name)
    {
        unset($this->inputs[$name]);
        return $this;
    }

    public function select($value, $name)
    {
        $this->inputs[$name] = $value;
        return $this;
    }

    public function press($buttonText)
    {
        $uri = $this->app['request']->getRequestUri();

        $crawler = new Crawler($this->response->getContent());

        $extractedValues = [];
        $crawler->filter('input, textarea, select')->each(function (Crawler $node) use (&$extractedValues) {
            $name = $node->attr('name');
            if (! $name || $name === '_token') {
                return;
            }

            $type = $node->attr('type');
            $tag = $node->nodeName();

            if ($type === 'checkbox' || $type === 'radio') {
                if ($node->attr('checked')) {
                    $extractedValues[$name] = $node->attr('value') ?? '1';
                }
            } elseif ($tag === 'select') {
                $node->filter('option')->each(function (Crawler $option) use (&$extractedValues, $name) {
                    if ($option->attr('selected')) {
                        $val = $option->attr('value');
                        if (str_ends_with($name, '[]')) {
                            $extractedValues[$name][] = $val;
                        } else {
                            $extractedValues[$name] = $val;
                        }
                    }
                });
            } elseif ($tag === 'textarea') {
                $extractedValues[$name] = $node->text();
            } else {
                $extractedValues[$name] = $node->attr('value');
            }
        });

        $allValues = array_merge($extractedValues, $this->inputs);

        $nestedInputs = [];
        foreach ($allValues as $key => $value) {
            $dottedKey = str_replace(['[', ']'], ['.', ''], rtrim($key, '[]'));
            \Illuminate\Support\Arr::set($nestedInputs, $dottedKey, $value);
        }

        $this->response = $this->post($uri, $nestedInputs);

        if ($this->response->isRedirect()) {
            $this->response = $this->followRedirect($this->response);
        }

        return $this;
    }

    protected function followRedirect($response)
    {
        $this->response = $this->get($response->headers->get('Location'));
        return $this->response;
    }

    public function followRedirects($response = null)
    {
        $this->followingRedirects();
        return $this;
    }

    public function see($text)
    {
        $this->response->assertSee($text, false);
        return $this;
    }

    public function dontSee($text)
    {
        $this->response->assertDontSee($text, false);
        return $this;
    }

    public function seeElement($selector, array $attributes = [])
    {
        $this->response->assertSeeElement($selector, $attributes);
        return $this;
    }

    public function seeElementCount($selector, $count)
    {
        $this->response->assertSeeElementCount($selector, $count);
        return $this;
    }

    public function dontSeeElement($selector, array $attributes = [])
    {
        $this->response->assertDontSeeElement($selector, $attributes);
        return $this;
    }

    public function seeInElement($selector, $text)
    {
        $this->response->assertSeeInElement($selector, $text);
        return $this;
    }

    public function dontSeeInElement($selector, $text)
    {
        $this->response->assertDontSeeInElement($selector, $text);
        return $this;
    }

    public function seeText($text)
    {
        $this->response->assertSeeText($text);
        return $this;
    }

    public function dontSeeText($text)
    {
        $this->response->assertDontSeeText($text);
        return $this;
    }

    public function crawler()
    {
        return $this->response->crawler();
    }

    public function within($selector, \Closure $callback)
    {
        $originalResponse = $this->response;

        $crawler = new Crawler($this->response->getContent());
        $subCrawler = $crawler->filter($selector);

        if ($subCrawler->count() === 0) {
            throw new \InvalidArgumentException("Element [{$selector}] not found.");
        }

        $subResponse = new class($subCrawler->outerHtml()) extends TestResponse {
            public function __construct($content) {
                $this->baseResponse = new \Illuminate\Http\Response($content);
            }
        };

        $this->response = $subResponse;

        $callback($subResponse);

        $this->response = $originalResponse;

        return $this;
    }
}
