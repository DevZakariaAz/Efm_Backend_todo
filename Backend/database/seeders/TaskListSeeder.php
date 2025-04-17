<?php

namespace Database\Seeders;

use App\Models\Tasklist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        Tasklist::create([
            'title' => 'Liste de tâches de ' . $user->name,
            'creationDate' => now(),
            'user_id' => $user->id
        ]);
    }
}
