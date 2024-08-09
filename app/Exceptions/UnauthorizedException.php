<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    // 認可拒否されたらエラーページを表示
    public function render($request)
    {
        return response()->view('errors.403', [], 403);
    }
}
