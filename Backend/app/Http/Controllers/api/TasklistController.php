<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TasklistRequest;
use App\Models\Tasklist;
use App\Services\TasklistService;

class TasklistController extends Controller
{
    protected $tasklistService;

    public function __construct(TasklistService $tasklistService)
    {
        $this->tasklistService = $tasklistService;
    }


    public function index()
    {
        $tasklists = $this->tasklistService->getAll();
        return response()->json($tasklists);
    }



    public function store(TasklistRequest $request)
    {

        try {
            $task = $this->tasklistService->create($request->validated());
            return response()->json($task, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function show(string $id)
    {
        $tasklist = $this->tasklistService->getById($id);
        if (!$tasklist) {
            return response()->json(['message' => 'ToDolist non trouvée'], 404);
        }
        return response()->json($tasklist);
    }


    public function update(TasklistRequest $request, string $id)
    {
        try {
            $tasklist = $this->tasklistService->update($id,$request->validated());
            return response()->json($tasklist, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function destroy(string $id)
    {
        $tasklistDeleted = $this->tasklistService->delete($id);

        if (!$tasklistDeleted) {
            return response()->json(['message' => 'ToDolist non trouvée'], 404);
        }

        return response()->json(['message' => 'ToDolist supprimée avec succès'], 200);
    }
}
