<?php

namespace LLoadout\LaravelMacros\CollectionMacros;

/**
 * Filter items that end with the given string.
 *
 * @param string $key
 * @param string $value
 * @param bool $casesensitive
 *
 * @mixin \Illuminate\Support\Collection
 *
 * @return mixed
 */

class whereEndsWith
{
    public function __invoke(): \Closure
    {
        return function (string $key, string $value, bool $casesensitive = true) {
            return $this->filter(function ($item) use ($key, $value, $casesensitive) {
                $comparer = ($casesensitive) ? 'strncmp' : 'strncasecmp';

                return $comparer(strrev(data_get($item, $key)), strrev($value), strlen($value)) === 0;
            });
        };
    }
}
