<?php namespace LLoadout\LaravelMacros\CollectionMacros;

class whereContains
{

    /**
     * Filter items that contain the given string.
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
                $haystack = data_get($item, $key);
                $haystack = ($casesensitive) ? $haystack : strtolower($haystack);
                $needle   = ($casesensitive) ? $value : strtolower($value);

                return str_contains($haystack, $needle);
            });
        };
    }
}