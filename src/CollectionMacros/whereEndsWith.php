<?php namespace LLoadout\LaravelMacros\CollectionMacros;

class whereEndsWith
{

    /**
     * Filter items that end with the given string.
     *
     * @param string $key
     * @param mixed $value
     * @param bool $casesensitive
     *
     * @return mixed
     */

    public function __invoke()
    {
        return function ($key, $value, $casesensitive = true) {
            return $this->filter(function ($item) use ($key, $value, $casesensitive) {
                $comparer = ($casesensitive) ? 'strncmp' : 'strncasecmp';

                return $comparer(strrev(data_get($item, $key)), strrev($value), strlen($value)) === 0;

            });
        };
    }
}