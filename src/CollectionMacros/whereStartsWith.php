<?php

namespace LLoadout\LaravelMacros\CollectionMacros;

use Illuminate\Support\HigherOrderCollectionProxy;

/**
 * Filter items that begin with the given string.
 * @param string $key
 * @param string $value
 * @param bool $casesensitive
 * @property-read HigherOrderCollectionProxy $each *
 * @mixin \Illuminate\Support\Collection
 *
 * @return mixed
 *

 */

class whereStartsWith
{
    public function __invoke(): \Closure
    {
        return function (string $key, string $value, bool $casesensitive = true) {
            return $this->filter(function ($item) use ($key, $value, $casesensitive) {
                $comparer = ($casesensitive) ? 'strncmp' : 'strncasecmp';

                return $comparer(data_get($item, $key), $value, strlen($value)) === 0;
            });
        };
    }
}
