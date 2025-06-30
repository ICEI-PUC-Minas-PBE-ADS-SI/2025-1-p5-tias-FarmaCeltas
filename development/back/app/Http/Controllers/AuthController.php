<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function register(Request $request):JsonResponse
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'celphone' => $request->input('phone', null),
        ]);

        return response()->json(
            [
                'message' => 'User registered successfully',
                'user' => $user,
            ],
            Response::HTTP_CREATED,
        );
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out'], Response::HTTP_NO_CONTENT);
    }

    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function refresh(): JsonResponse
    {
        $newToken = auth()->refresh();

        return response()->json([
            'token' => $newToken,
            'token_type' => 'Bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function stats(): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();

        $quizzesCompleted = \App\Models\AnswerQuizz::where('user_id', $user->id)->count();

        $answers = \App\Models\AnswerQuizz::where('user_id', $user->id)->get();
        $averageScore = 0;
        $totalQuestions = 0;
        if ($answers->count() > 0) {
            $totalQuestions = $answers->sum(function($a) { return $a->quiz->questions->count(); });
            $totalAcertos = $answers->sum('score');
            $averageScore = $totalQuestions > 0 ? round(($totalAcertos / $totalQuestions) * 100) : 0;
        }

        $postsRead = 0;

        return response()->json([
            'quizzesCompleted' => $quizzesCompleted,
            'postsRead' => $postsRead,
            'averageScore' => $averageScore,
        ]);
    }
}
