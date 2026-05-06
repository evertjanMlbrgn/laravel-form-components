<?php

namespace Mlbrgn\LaravelFormComponents\Helpers;

use Illuminate\Support\Arr;

class FormDataBinder
{
    /**
     * Tree of bound targets.
     */
    private array $bindings = [];

    /**
     * Bind a target to the current instance
     */
    public function bind(mixed $target): void
    {
        $this->bindings[] = $target;
    }

    /**
     * Get the latest bound target.
     */
    public function get(): mixed
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding.
     */
    public function pop(): void
    {
        array_pop($this->bindings);
    }
}
