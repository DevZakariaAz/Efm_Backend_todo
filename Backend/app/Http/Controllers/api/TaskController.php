<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAll();
        return response()->json($tasks);
    }
    public function store(TaskRequest $request)
    {
        try {
            $task = $this->taskService->create($request->validated());
            return response()->json($task, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function show(string $id)
    {
        $task = $this->taskService->getById($id);
        if (!$task) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }
        return response()->json($task);
    }


    public function update(TaskRequest $request, string $id)
    {
        try {
            $task = $this->taskService->update($id,$request->validated());
            return response()->json($task, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy(String $id)
    {
        $taskDeleted = $this->taskService->delete($id);

        if (!$taskDeleted) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }

        return response()->json(['message' => 'Tâche supprimée avec succès'], 200);
    }
}
