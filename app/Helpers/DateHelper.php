<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * Date format from d/m/Y to Y-m-d
     *
     * @param  string|required  $date
     * @param  boolean|null  $resetHour
     *
     * @return string datetime format
     */
    public static function dateFormatTimestamp($date, $resetHour = false)
    {
        $dateFormat = Carbon::createFromFormat('d/m/Y', $date);

        if ($resetHour) {
            $dateFormat->hour = 0;
            $dateFormat->minute = 0;
            $dateFormat->second = 0;
        }

        return $dateFormat;
    }
}
