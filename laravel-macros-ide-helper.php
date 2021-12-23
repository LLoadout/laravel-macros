<?php

namespace Illuminate\Support {
    class Collection {
        /* @return Collection */
        public function whereContains (string $key, string $value, bool $casesensitive = true){}

        /* @return Collection */
        public function whereEndsWith (string $key, string $value, bool $casesensitive = true){}

        /* @return Collection */
        public function whereStartsWith (string $key, string $value, bool $casesensitive = true){}

        /* @return array */
        public function forSelectBox(string $key, string $value, bool $addempty){}
    }
}

namespace Illuminate\Support\Facades {
    /**
     *
     *
     * @see \Illuminate\Filesystem\Filesystem
     */
    class File
    {
        /**
         * Get a file by its path.
         *
         * @param string $path
         *
         * @return \SplFileInfo
         * @static
         */
        public static function getFile($path)
        {
            /** @var \Illuminate\Filesystem\Filesystem $instance */
            return $instance->getFile($path);
        }
    }
}

