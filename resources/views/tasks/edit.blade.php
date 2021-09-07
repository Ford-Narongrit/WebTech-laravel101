@extends('layouts.main')

@section('content')
<h1 class="text-center text-5xl py-3">EDIT TASKS</h1>

<form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class="text-center space-y-3">
    @csrf
    @method('PUT')
    <div class="text-xl">
        <label for="name">Task Title</label>
        <input type="text" name="title" class="" value="{{ $task->title }}" placeholder="Task title" autocomplete="off">
    </div>
    <div class="text-xl">
        <label for="detail">Detail</label>
        <input type="text" name="detail" class="" value="{{ $task->detail }}" placeholder="detail" autocomplete="off">
    </div>
    <div class="text-xl">
        <label for="due_date">due_date</label>
        <input type="date" name="due_date" class="" value="{{ $task->due_date }}" placeholder="detail" autocomplete="off">
    </div>
    <div>
        <button type="submit" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">Edit Task</button>
    </div>
</form>
@endsection