<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Todo\StoreTodoRequest;
use App\Http\Requests\API\Todo\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TodoController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        try {
            $user = auth()->user();
            $todos = $user->todos()->orderBy('created_at', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $todos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve todos'
            ], 500);
        }
    }

    public function store(StoreTodoRequest $request): JsonResponse
    {
        try {
            $user = auth()->user();

            $todo = $user->todos()->create([
                'title' => $request->title,
                'description' => $request->description,
                'is_done' => $request->is_done ?? false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Todo created successfully',
                'data' => $todo
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create todo'
            ], 500);
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            $user = auth()->user();
            $todo = $user->todos()->find($id);

            if (!$todo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Todo not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $todo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve todo'
            ], 500);
        }
    }

    public function update(UpdateTodoRequest $request, string $id): JsonResponse
    {
        try {
            $user = auth()->user();
            $todo = $user->todos()->find($id);

            if (!$todo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Todo not found'
                ], 404);
            }

            $todo->update($request->only(['title', 'description', 'is_done']));

            return response()->json([
                'success' => true,
                'message' => 'Todo updated successfully',
                'data' => $todo->fresh()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update todo'
            ], 500);
        }
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $user = auth()->user();
            $todo = $user->todos()->find($id);

            if (!$todo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Todo not found'
                ], 404);
            }

            $todo->delete();

            return response()->json([
                'success' => true,
                'message' => 'Todo deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete todo'
            ], 500);
        }
    }
}