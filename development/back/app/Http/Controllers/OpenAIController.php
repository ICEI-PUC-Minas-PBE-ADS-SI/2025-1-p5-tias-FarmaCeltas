<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OpenAIQuestion;
use src\OpenAI\Http\Manager\ChatComplementsManager;

class OpenAIController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate(['question' => 'required|string|max:1000']);
        $user = Auth::user();

        $openaiQuestion = OpenAIQuestion::create([
            'user_id' => $user->id,
            'question' => $request->question,
        ]);

        $response = app(ChatComplementsManager::class)
             ->sendChatComplements($request->question);

        $openaiQuestion->answer = $response ?? null;
        $openaiQuestion->save();

        return response()->json([
            'question' => $openaiQuestion->question,
            'answer' => $openaiQuestion->answer,
        ]);
    }

    public function history()
    {
        $user = Auth::user();
        $history = OpenAIQuestion::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get(['id', 'question', 'answer', 'created_at']);
        return response()->json($history);
    }
}
