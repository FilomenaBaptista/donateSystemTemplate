<?php

namespace App\Helpers;

use Exception;

class ExceptionHelper
{
    /**
     * Undocumented function
     *
     * @param Exception $e
     * @return void
     */
    public static function treatException(Exception $e) {
        (int) $eMessage = preg_replace("/[^0-9]/", "", $e->getMessage());
        return is_numeric($eMessage) ? $eMessage : $e->getCode();
    }
}
