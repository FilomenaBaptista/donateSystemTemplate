<?php

namespace App\Helpers;

use Exception;
use Psr\Log\LogLevel;
use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use App\Services\LogErrorService;
use Illuminate\Support\Facades\Mail;

class MailHelper
{
    /**
     * Undocumented function
     *
     * @param string $language language to body
     * @param array $token  user token to recover
     * @param string $email user email
     * 
     * @return Response response json
     */
    public static function sendRecoveryMail(string $language, array $token, string $email)
    {
        try {

            $supportMail = 'suporte@softvision.com.br';
            $appName = env('APP_NAME');

            Mail::send('emails.' . $language . '.recovery', $token, function ($message) use ($email, $supportMail, $appName) {
                $message->to($email, 'Solicitação de recuperação de senha.')->subject('Solicitação de recuperação de senha.');
                $message->from($supportMail, $appName);
            });
            
            return StatusHelper::response(['tag' => 'PASS.RECOVERY', 'status' => 200]);

        } catch (Exception $e) {
            LogErrorService::LogErrorsApp('sendRecoveryMail', LogLevel::INFO, (int)__LINE__, $e);
            return StatusHelper::response(['tag' => 'MAIL', 'status' => 500, 'line_trace' => __LINE__, 'class_trace' => 'sendRecoveryMail']);
        }
    }
}
