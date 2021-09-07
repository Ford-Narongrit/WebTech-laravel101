@extends('layouts.main')

@section('content')
<h1 class="text-center text-5xl py-3">TASKS CREATE</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="text-center space-y-3">
    @csrf
    <div class="text-xl">
        <label for="name">Task Title</label>
        <input type="text" name="title" class="" placeholder="Task title" autocomplete="off">
    </div>
    <div class="text-xl">
        <label for="detail">Detail</label>
        <input type="text" name="detail" class="" placeholder="detail" autocomplete="off">
    </div>
    <div class="text-xl">
        <label for="due_date">due_date</label>
        <input type="date" name="due_date" class="" placeholder="detail" autocomplete="off">
    </div>
    <div>
        <button type="submit" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">Add Task</button>
    </div>
</form>

@endsection