<?php

namespace App\Helpers;

class PathHelper
{
    /**
     * Undocumented function
     *
     * @param string $class current class
     * @return string base path of curent class
     */
    public static function getPathNameClass($class)
    {
        $className = class_basename($class);
        return base_path($className);
    }

    /**
     * Undocumented function
     *
     * @param string $class current class
     * @return string base name of curent class
     */
    public static function getClassName($class) {
        return class_basename($class);
    }
}
