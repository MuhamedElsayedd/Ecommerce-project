<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UserRegisterRequest;

class UserRegisterController extends Controller
{
    public function __invoke(UserRegisterRequest $request): JsonResponse
    {
        try {
            $user = DB::transaction(function () use ($request) {
                return User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            });

            $token = $user->createToken('authToken')->plainTextToken;

            return successResponse(
                data: [
                    'user'  => new UserResource($user),
                    'token' => $token,
                ],
                message: 'User registered successfully',
                statusCode: Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            logError('User registration failed', $e);

            return errorResponse(
                message: 'Registration failed',
                errors: $e->getMessage(),
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
