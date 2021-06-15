<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function create(User $user): JsonResponse
    {
        $token = $user->createToken($user->email);

        return new JsonResponse(['token' => $token->accessToken]);
    }
}
