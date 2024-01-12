<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tasks', function () {
    $tasks=\App\Models\Task::latest()->paginate(10);
    return view('tasks',[
        'tasks'=>$tasks
    ]);
})->name('tasks.index');

Route::view('/task/create','create')->name('task.create');

Route::get('/task/{task}/edit', function (Task $task) {
    return view('edit',[
        'task'=>$task
    ]);
})->name('tasks.edit');

Route::delete('/task/{task}/delete', function (Task $task) {
$task->delete();
    return redirect()->route('tasks.index')
        ->with('successes', 'Task deleteed successfully');
})->name('task.destroy');

Route::get('/task/{task}', function (Task $task) {
    return view('show',[
        'task'=>$task
    ]);
})->name('tasks.show');

Route::post('/task', function (TaskRequest $request){
    $task=Task::create($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])
    ->with('successes', 'Task created successfully');
})->name('task.store');

Route::put('/task/{task}', function (Task $task, TaskRequest $request){
    $task->update($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])
        ->with('successes', 'Task updated successfully');
})->name('task.update');

Route::put('tasks/{task}/toggle-complete',function (Task $task){
   $task->toggleCompleted();
   return redirect()->back()->with('status','Status changed successfully');
})->name('task.toggle');

//Route::fallback(function (){
//    return'incorrect page';
//});

