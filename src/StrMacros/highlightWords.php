<?php

namespace LLoadout\LaravelMacros\StrMacros;

/**
 * Highlight the given words in a sentence.
 *
 * @param string $words
 *
 * @return string
 */
class highlightWords
{
    public function __invoke(): \Closure
    {
        return function (string $sentence, mixed $words, string $highlighter = '<b>') {
            $words = ! is_array($words) ? [$words] : $words;
            $highlighter = str_replace(['<','>'], '', $highlighter);
            foreach ($words as $word) {
                $sentence = preg_replace("/\w*?".preg_quote($word)."\w*/i", "<$highlighter>$0</$highlighter>", $sentence);
            }

            return $sentence;
        };
    }
}
