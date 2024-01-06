@extends('layout.app')
@section('title',$task->title)
@section('content')
    <div class="mt-4 mb-2">
        <a href="{{route('tasks.index')}}"
           class="front-medium text-gray-700 underline decoration-pink-500 hover:bg-sky-700"><-Go back to the task
            list</a>
    </div>
    <p>
        @if($task->Completed)
           <span class="font-medium text-green-700">Completed</span>
        @else
            <span class="font-medium text-red-700">Not completed</span>
        @endif
    </p>
    <p class="mt-4 text-blue-900">{{$task->description}}</p>
    @if($task->long_description)
        <p class="mt-4 text-orange-600">{{$task->long_description}}</p>
    @endif
    @if($task->created_at==$task->updated_at)
        <p class="mt-4 text-sm text-slate-700">Created: {{$task->created_at->diffForHumans()}}</p>
    @else
        <p class="mt-4">Created: {{$task->created_at->diffForHumans()}}</p>
        <p class="mt-4">Updated: {{$task->updated_at->diffForHumans()}}</p>
    @endif
    <div class="flex gap-2 mt-4">
        <a href="{{route('tasks.edit',['task'=>$task])}}"class="btn">Edit</a>
        <form method="POST" action="{{route('task.toggle',['task'=>$task])}}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">
                Mark as {{$task->Completed?'not completed':'completed'}}
            </button>
        </form>
        <form action="{{route('task.destroy',['task'=>$task->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">DELETE</button>
        </form>
    </div>
@endsection
