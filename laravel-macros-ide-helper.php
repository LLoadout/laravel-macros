<?php

namespace Illuminate\Support {
    /**
     * Collection
     * @method Collection whereContains
     * @method Collection whereEndsWith
     * @method Collection whereStartsWith
  */
    class Collection {}
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

