<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

    Route::post('/', function (Request $request) {
        $task = new Task();

        $task->title = $request->title;
        $task->slug = Str::uuid()->toString();

        $task->save();

        return $task;
    })->name('create');
});
