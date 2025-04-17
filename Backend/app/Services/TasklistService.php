<?php

namespace App\Services;

use App\Repositories\TasklistRepository;

class TasklistService
{
    private $tasklistRepository;

    public function __construct(TasklistRepository $tasklistRepository)
    {
        $this->tasklistRepository = $tasklistRepository;
    }

    public function getAll()
    {
        return $this->tasklistRepository->getAll();
    }

    public function getById($id)
    {
        return $this->tasklistRepository->getById($id);
    }
    public function create($data)
    {
        return $this->tasklistRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->tasklistRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->tasklistRepository->delete($id);
    }
}
