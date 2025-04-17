<?php


namespace App\Repositories;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TaskRepository
{
    public function getAll()
    {
        return Task::all();
    }

    public function getById($id)
    {
        return Task::find($id);
    }

    public function create($data)
    {
        return Task::create($data);
    }

    public function update($id, $data)
    {
        $task = Task::find($id);
        if (!$task) {
            return false;
        }
        $task->update($data);
        return $task;
    }


    public function delete($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return false;
        }
        return $task->delete();
    }
}

