@extends('layouts.main')

@section('content')
<div class="text-center text-5xl py-3">TASKS LIST</div>
<div class="text-center block my-4">
    <a href="{{ route('tasks.create') }}" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">Add New Task</a>
</div>
<div class="grid grid-cols-3 gap-2">
    @foreach ($tasks as $task)
    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="bg-blue-200 p-4 rounded-xl text-center space-y-2 hover:bg-blue-100">
        <div class="text-xl">{{$task->title}}</div>
        <div class="text-lg">{{$task->detail}}</div>
    </a>
    @endforeach
</div>
@endsection