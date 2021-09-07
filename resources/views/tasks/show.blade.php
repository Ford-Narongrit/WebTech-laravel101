@extends('layouts.main')

@section('content')
<h1 class="text-center text-5xl py-3">{{ $task->title }}</h1>
<div class="text-center text-xl">
    {{ $task->detail }}
</div>
<div class="text-center text-xl text-red-500">
    {{ $task->due_date }}
</div>
<div class="text-center block my-4">
    <a href="{{ route('tasks.index') }}" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">ALL TASK</a>
    <a href="{{ route('tasks.edit', ['task' => $task->id])  }}" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">EDIT TASK</a>
    <div class="flex justify-center">
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="p-4 space-y-4">
            @method('DELETE')
            @csrf
            <label for="destroy" class="text-xl">Enter Title</label>
            <input type="text" placeholder="enter title" name="title" class="block">
            <button type="submit" class="bg-red-400 rounded-xl p-2 hover:bg-red-300">delete</button>
        </form>
    </div>
</div>
@endsection