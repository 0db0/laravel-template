<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class MissingScopeException extends Exception
{
    public function render(): JsonResponse
    {
        return new JsonResponse([
            'code' => 401,
            'message' => $this->getMessage()
        ], 401);
    }
}
