<?php

namespace LLoadout\LaravelMacros\StrMacros;

/**
 * Capitalize every word in a sentence.
 *
 * @param string $words
 *
 * @return string
 */
class capitalizeWords
{
    public function __invoke(): \Closure
    {
        return function (string $words) {
            $words = collect(explode(" ", $words));

            return $words->transform(fn ($word) => ucfirst($word))->implode(" ");
        };
    }
}
