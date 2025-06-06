<?php

namespace App\Http\Controllers\Quizz;

use App\Http\Controllers\Controller;
use App\Models\AnswerQuizz;
use App\Models\Quizz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function submit(Request $request, $quizId): JsonResponse
    {
        $quiz = Quizz::with('questions')->find($quizId);

        if (!$quiz) {
            return response()->json(['error' => 'Quiz não encontrado.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer|exists:quizz_questions,id',
            'answers.*.answer' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $answers = collect($request->input('answers'));
        $questions = $quiz->questions->keyBy('id');
        $score = 0;
        $results = [];

        foreach ($answers as $entry) {
            $questionId = $entry['question_id'];
            $givenAnswer = trim(strtolower($entry['answer']));
            $correctAnswer = trim(strtolower($questions[$questionId]->correct_answer ?? ''));
            $isCorrect = $givenAnswer === $correctAnswer;

            if ($isCorrect) {
                $score++;
            }

            $results[] = [
                'question_id' => $questionId,
                'user_answer' => $entry['answer'],
                'correct_answer' => $questions[$questionId]->correct_answer ?? null,
                'is_correct' => $isCorrect,
                'statement' => $questions[$questionId]->exercise_statement ?? null,
            ];
        }

        $answerQuizz = AnswerQuizz::create([
            'quiz_id' => $quiz->id,
            'user_id' => Auth::id(),
            'score' => $score,
        ]);

        return response()->json([
            'message' => 'Respostas registradas com sucesso.',
            'score' => $score,
            'total_questions' => $quiz->questions->count(),
            'results' => $results,
        ], 201);
    }

    public function myResults(): JsonResponse
    {
        $results = AnswerQuizz::with('quiz')
            ->where('user_id', Auth::id())
            ->get();

        return response()->json($results);
    }
}
