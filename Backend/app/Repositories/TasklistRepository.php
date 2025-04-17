<?php

namespace App\Repositories;

use App\Models\Tasklist;
use App\Repositories\BaseRepository;

class TasklistRepository
{
    public function getAll()
    {
        return Tasklist::all();
    }

    public function getById($id)
    {
        return Tasklist::find($id);
    }

    public function create($data)
    {
        return Tasklist::create($data);
    }

    public function update($id, $data)
    {
        $tasklist = Tasklist::find($id);
        if (!$tasklist) {
            return false;
        }
        $tasklist->update($data);
        return $tasklist;
    }

    public function delete($id)
    {
        $tasklist = Tasklist::find($id);
        if (!$tasklist) {
            return false;
        }
        return $tasklist->delete();
    }
}




