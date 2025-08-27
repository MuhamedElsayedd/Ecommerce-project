<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserAuthController extends Controller
{
    public function login(UserAuthRequest $request)
    {

        /** @var \App\Models\User|null $user */
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return errorResponse(
                message: 'Invalid credentials',
                statusCode: Response::HTTP_UNAUTHORIZED
            );
        }


        $token = $user->createToken('authToken')->plainTextToken;

        return successResponse(
            data: [
                'user'  => new UserResource($user),
                'token' => $token,
            ],
            message: 'User Logined successful',
            statusCode: Response::HTTP_OK
        );
    }

    public function logout()
    {
        request()->user()?->currentAccessToken()?->delete();

        return successResponse(
            message: 'User Log out successfully',
            statusCode: Response::HTTP_OK
        );
    }
}
