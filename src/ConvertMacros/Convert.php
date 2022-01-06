<?php

namespace LLoadout\LaravelMacros\ConvertMacros;

class Convert
{
    public function __construct(\stdClass $object)
    {
        $this->object = $object;
    }

    /**
     * @param mixed $something
     * @return object
     */
    public static function variable(mixed $something): self
    {
        $something = ! self::isJson($something) ? json_encode($something) : $something;

        return new convert((object)json_decode($something));
    }

    public static function isJson($something)
    {
        if (is_array($something) || is_object($something)) {
            return false;
        }
        json_decode($something);

        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return json_decode(json_encode($this->object), true);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->object);
    }

    /**
     * @return \stdClass
     */
    public function toObjects(): \stdClass
    {
        return (object) json_decode(json_encode($this->object));
    }
}
