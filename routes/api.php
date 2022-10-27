<?php

use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['name' => 'tasks.', 'prefix' => 'tasks'], function () {
    Route::get('/', function () {
        return Task::all();
    })->name('all');

    Route::get('/{task}', function (Task $task) {
        return $task;
    })->name('single');

    Route::post('/', function (Request $request) {
        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->slug = uniqid(rand());
        $task->user_id = 1;

        if ($request->completed) {
            $task->completed_at = Carbon::now();
        }

        if ($request->projectId) {
            $task->project_id = $request->projectId;
        }

        $task->save();

        return $task;
    })->name('create');
});

Route::group(['name' => 'projects.', 'prefix' => 'projects'], function () {
    Route::get('/', function () {
        return Project::all();
    })->name('all');

    Route::get('/{project}', function (Project $project) {
        return $project;
    })->name('single');

    Route::get('/{project}/tasks', function (Project $project) {
        return $project->with('tasks')->get();
    })->name('single.withTasks');
});
