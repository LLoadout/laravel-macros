<?php namespace LLoadout\LaravelMacros\FileSystemMacros;

class getFile
{

    /**
     * Get a file by its path.
     *
     * @param string $path
     *
     * @return \SplFileInfo
     */

    public function __invoke()
    {
        return function ($path) {
            return new \SplFileInfo($path);
        };
    }
}