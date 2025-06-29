<?php

namespace App\Http\Controllers\Quizz;

use App\Http\Controllers\Controller;
use App\Models\Quizz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 9);
        $quizzes = Quizz::paginate($perPage);

        return response()->json($quizzes, 200);
    }

    public function show($id): JsonResponse
    {
        $quiz = Quizz::with('questions')->find($id);

        if (!$quiz) {
            return response()->json(['error' => 'Quiz não encontrado.'], 404);
        }

        return response()->json($quiz);
    }

    public function store(Request $request): JsonResponse
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'difficulty' => 'required|string|max:50',
            'questions' => 'required|array|min:1',
            'questions.*.statement' => 'required|string',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.correct_index' => 'required|integer|min:0',
        ]);

        $quiz = Quizz::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'theme' => $request->theme,
            'difficulty' => $request->difficulty,
        ]);

        // Salva as perguntas
        foreach ($request->questions as $question) {
            $options = $question['options'];
            $correctIndex = $question['correct_index'];
            $correctAnswer = $options[$correctIndex];

           $quizz = \App\Models\QuizzQuestion::create([
                'quiz_id' => $quiz->id,
                'exercise_statement' => $question['statement'],
                'options' => $options,
                'correct_answer' => $correctAnswer,
            ]);
        }

        return response()->json($quiz, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $quiz = Quizz::find($id);

        if (!$quiz) {
            return response()->json(['error' => 'Quiz não encontrado.'], 404);
        }

        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

        $quiz->update($request->only(['title', 'theme', 'difficulty']));

        return response()->json($quiz);
    }

    public function destroy($id): JsonResponse
    {
        $quiz = Quizz::find($id);

        if (!$quiz) {
            return response()->json(['error' => 'Quiz não encontrado.'], 404);
        }

        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

        $quiz->delete();

        return response()->json(['message' => 'Quiz deletado com sucesso.']);
    }
}
