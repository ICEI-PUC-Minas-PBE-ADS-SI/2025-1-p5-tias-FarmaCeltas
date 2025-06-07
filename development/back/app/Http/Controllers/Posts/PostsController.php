<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Post::latest()->paginate(10));
    }

    public function show($id): JsonResponse
    {
        $material = Post::find($id);

        if (!$material) {
            return response()->json(['error' => 'Material de estudo não encontrado.'], 404);
        }

        return response()->json($material);
    }

    public function store(Request $request): JsonResponse
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,text,link',
            'content' => 'required|string',
        ]);

        $material = Post::create(array_merge($data, [
            'user_id' => Auth::id(),
        ]));

        return response()->json($material, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $material = Post::find($id);

        if (!$material) {
            return response()->json(['error' => 'Material não encontrado.'], 404);
        }

        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

        $material->update($request->only(['title', 'type', 'content']));

        return response()->json($material);
    }

    public function destroy($id): JsonResponse
    {
        $material = Post::find($id);

        if (!$material) {
            return response()->json(['error' => 'Material não encontrado.'], 404);
        }

        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Acesso não autorizado.'], 403);
        }

        $material->delete();

        return response()->json(['message' => 'Material excluído com sucesso.']);
    }
}
