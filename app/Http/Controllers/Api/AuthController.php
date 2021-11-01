<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use App\Service\Auth\AuthServiseInterface;

class AuthController extends Controller
{


    /**
     * @var AuthServiseInterface
     */
    private $userService;

    /**
     * AuthController constructor.
     * @param AuthServiseInterface $userService
     */
    public function __construct(AuthServiseInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->userService->createUser($request->all());


        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $token = $request->user()->createToken('authtoken');

        return response()->json(
            [
                'message' => 'Logged in baby',
                'data' => [
                    'user' => $request->user(),
                    'token' => $token->plainTextToken
                ]
            ]
        );
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

}
