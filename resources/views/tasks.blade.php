@extends('layout.app')
@section('content')
<nav class="mb-8 mt-8">
    <a href="{{route('task.create')}}"
    class="front-medium text-gray-700 underline decoration-pink-500 hover:bg-sky-700">ADD task</a>
</nav>
<h1 class="mb-5">LIST OF TASKS</h1>
@forelse ($tasks as $task)
    <div>
        <a href="{{route('tasks.show',['task'=>$task->id])}}"
        @class(['font-bold line-through'=>$task->Completed])>{{ $task->title}}</a>
    </div>
@empty
    <p>No task</p>
@endforelse
@if($tasks->count())
    <nav class="mt-8">
        {{$tasks->links()}}
    </nav>
@endif
@endsection
