<?php

namespace LLoadout\LaravelMacros\ConvertMacros;

class Convert
{
    private static function variable(mixed $something): \stdClass
    {
        $something = ! self::isJson($something) ? json_encode($something) : $something;

        return (object)json_decode($something);
    }

    /**
     * @param mixed $something
     * @return bool
     */
    private static function isJson($something) : bool
    {
        if (is_array($something) || is_object($something)) {
            return false;
        }
        json_decode($something);

        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * @param mixed $variable
     * @return array
     */
    public static function toArray($variable): array
    {
        return json_decode(json_encode(self::variable($variable)), true);
    }

    /**
     * @param mixed $variable
     * @return string
     */
    public static function toJson($variable): string
    {
        return json_encode(self::variable($variable));
    }

    /**
     *
     * @param mixed $variable
     * @return \stdClass
     */
    public static function toObject($variable): \stdClass
    {
        return (object) json_decode(json_encode(self::variable($variable)));
    }
}
