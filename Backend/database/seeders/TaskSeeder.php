<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Tasklist;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taskList = Tasklist::first();
        Task::insert([
            [
                'title' => 'Acheter du lait',
                // 'description' => 'Aller au supermarché et acheter du lait',
                // 'status' => false,
                // 'important' => true,
                // 'creationDate' => now(),
                // 'dueDate' => now()->addDays(2),
                // 'tasklist_id' => $taskList->id
            ],
            [
                'title' => 'Réviser Laravel',
                // 'description' => 'Relire la documentation Laravel et expérimenter les migrations',
                // 'status' => false,
                // 'important' => false,
                // 'creationDate' => now(),
                // 'dueDate' => now()->addDays(5),
                // 'task_list_id' => $taskList->id
            ]
        ]);
    }
}
