@extends('layout.app')
@section('title', isset($task)? 'Edit task': 'Add task')
@section('content')
    <form method="POST" action="{{isset($task)? route('task.update',['task'=>$task->id]):route('task.store')}}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mt-4">
            <label for="title">
                Title
            </label>
            <input text="text" name="title" id="title"
                   @class(['border-red-500'=>$errors->has('title')])
                   value="{{$task->title?? old('title')}}">
            @error('title')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="description">Description</label>
            <textarea name="description" name="description"
                      @class(['border-red-500'=>$errors->has('description')])
                      rows="2">{{$task->description?? old('description')}}</textarea>
            @error('description')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" name="long_description"
                      @class(['border-red-500'=>$errors->has('long_description')])
                      rows="6">{{$task->long_description??old('long_description')}}</textarea>
            @error('long_description')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div class="mt-4 flex items-center gap-2">
            <button type="submit">
                @isset($task)
                    <span class="btn">Update Task</span>
                @else
                    <span class="btn">Add Task</span>
                @endisset
            </button>
            <a href="{{route('tasks.index')}}">Cancel</a>
        </div>
    </form>
@endsection
