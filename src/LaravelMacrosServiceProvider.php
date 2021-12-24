<?php

namespace LLoadout\LaravelMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class LaravelMacrosServiceProvider extends ServiceProvider
{
    public function register()
    {
        Collection::make($this->macros())->each(function ($macros, $type) {
            collect($macros)->reject(fn ($class, $macro) => $type::hasMacro($macro))
                ->each(fn ($class, $macro) => $type::macro($macro, app($class)()));
        });
    }

    private function macros(): array
    {
        return [
            'Illuminate\Support\Collection' => [
                'whereStartsWith' => \LLoadout\LaravelMacros\CollectionMacros\whereStartsWith::class,
                'whereEndsWith' => \LLoadout\LaravelMacros\CollectionMacros\whereEndsWith::class,
                'whereContains' => \LLoadout\LaravelMacros\CollectionMacros\whereContains::class,
                'forSelectBox' => \LLoadout\LaravelMacros\CollectionMacros\forSelectBox::class,
            ],
            'Illuminate\Support\Facades\File' => [
                'getFile' => \LLoadout\LaravelMacros\FileSystemMacros\getFile::class,
            ],
            'Illuminate\Support\Str' => [
                'capitalizeWords' => \LLoadout\LaravelMacros\StrMacros\capitalizeWords::class,
                'highlightWords' => \LLoadout\LaravelMacros\StrMacros\highlightWords::class,
            ],
        ];
    }
}
