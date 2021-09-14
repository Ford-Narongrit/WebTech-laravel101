@extends('layouts.main')

@section('content')
    <h1 class="text-center text-5xl py-3">TASKS CREATE</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-3">
        @csrf
        <div class="text-xl space-y-2">
            <label for="name" class="text-2xl">Task Title</label>
            <input type="text" name="title" class="w-full px-2 py-3 rounded-xl border" placeholder="Task title"
                autocomplete="off">
        </div>
        <div class="text-xl space-y-2">
            <label for="detail" class="text-2xl">Detail</label>
            <textarea type="text" name="detail" rows="4" cols="50" class="w-full px-2 py-3 rounded-xl border"
                placeholder="detail" autocomplete="off"></textarea>
        </div>
        <div class="text-xl space-y-2">
            <label for="due_date" class="text-2xl block">Due_date</label>
            <input type="date" name="due_date" class="px-2 py-3 rounded-xl border" placeholder="detail" autocomplete="off">
        </div>

        <div class="text-xl space-y-2">
            <label for="tags" class="text-2xl block">Task Tags (separated with comma)</label>
            <input type="text" name="tags" class="w-full px-2 py-3 rounded-xl border" autocomplete="off"
                placeholder="detail">
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-green-400 rounded-xl text-xl hover:bg-green-300 p-5">Add Task</button>
        </div>
    </form>

@endsection
