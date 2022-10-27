<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Project::truncate();
        Task::truncate();

        $user = User::factory()->create();

        $project = Project::create([
            'title' => 'First Project',
            'slug' => uniqid(rand()),
            'user_id' => $user->id,
        ]);

        Task::create([
            'title' => 'First Task',
            'slug' => uniqid(rand()),
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
