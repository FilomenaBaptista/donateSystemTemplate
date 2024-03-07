<?php

namespace App\Helpers;

class StatusHelper
{

    /**
     * Undocumented function
     *
     * @param array $data array of return logs
     * @return array array of return logs
     */
    public static function response($data)
    {
        $listHttpStatus = [
            200 => '.SUCCESS',
            203 => '.INCORRECT',
            302 => '.REGISTER.FOUND',
            401 => '.UNATHORIZED',
            403 => '.FORBIDDEN',
            404 => '.NOT.FOUND',
            424 => '.DEPENDECY.FAIL',
            428 => '.FAILED.ATTEMPTS',
            429 => '.MAX.ATTEMPTS',
            451 => '',
            500 => '.APPLICATION.ERROR',
            2002 => '.CONNECTION.TIME.OUT',
            4202 => '.ILLEGAL.OFFSET.TYPE',
            4222 => 'UNKNOWN.COLUMN',
            23000 => '.CONSTRAIT.VIOLATION'
        ];

        if (array_key_exists('status', $data)) {
            return [
                'data' => isset($data['data']) ? $data['data'] : '',
                'line_trace' => isset($data['line_trace']) ?  $data['line_trace'] : '',
                'class_trace' => isset($data['class_trace']) ? $data['class_trace'] : '',
                'message' => $data['tag'] . $listHttpStatus[$data['status']],
                'status' => $data['status']
            ];
        }

        return false;
    }
}
