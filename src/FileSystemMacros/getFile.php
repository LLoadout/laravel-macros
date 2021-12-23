<?php

namespace LLoadout\LaravelMacros\FileSystemMacros;

/**
 * Get a file by its path.
 *
 * @param string $path
 *
 * @return \SplFileInfo
 */
class getFile
{
    public function __invoke(): \Closure
    {
        return function ($path) {
            return new \SplFileInfo($path);
        };
    }
}
