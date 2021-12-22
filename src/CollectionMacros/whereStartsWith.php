<?php namespace LLoadout\LaravelMacros\CollectionMacros;

class whereStartsWith
{

    /**
     * Filter items that begin with the given string.
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

                return $comparer(data_get($item, $key), $value, strlen($value)) === 0;
            });
        };
    }
}