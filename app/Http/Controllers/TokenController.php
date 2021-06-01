<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TokenController
{
    public function create(User $user): JsonResponse
    {
        $token = $user->createToken($user->email);

        return new JsonResponse(['token' => $token->plainTextToken]);
    }
}
