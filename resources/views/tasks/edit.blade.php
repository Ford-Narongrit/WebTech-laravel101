@extends('layouts.main')

@section('content')
    <h1 class="text-center text-5xl py-3">EDIT TASKS</h1>

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class="space-y-3">
        @csrf
        @method('PUT')
        <div class="text-xl space-y-2">
            <label for="name" class="text-2xl">Task Title</label>
            <input type="text" name="title"
                class="w-full px-4 py-3 rounded-xl border @error('title') border-red-600 @enderror"
                value="{{ old('title', $task->title) }}" placeholder="Task title" autocomplete="off">
            @error('title')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="text-xl space-y-2">
            <label for="detail" class="text-2xl">Detail</label>
            <textarea type="text" name="detail" rows="4" cols="50"
                class="w-full px-4 py-3 rounded-xl border @error('detail') border-red-600 @enderror" placeholder="detail"
                autocomplete="off">{{ old('detail', $task->detail) }}</textarea>
            @error('detail')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="text-xl space-y-2">
            <label for="due_date" class="text-2xl block">Due_date</label>
            <input type="date" name="due_date" class="px-4 py-3 rounded-xl border @error('due_date') border-red-600 @enderror"
                value="{{ $task->due_date->format('Y-m-d') }}" placeholder="detail" autocomplete="off">
            @error('due_date')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="text-xl space-y-2">
            <label for="tags" class="text-2xl block">Task Tags (separated with comma)</label>
            <input type="text" name="tags" value="{{ $task->tag_names }}" class="w-full px-4 py-3 rounded-xl border"
                autocomplete="off" placeholder="tags">
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-green-400 rounded-xl text-xl hover:bg-green-300 p-5">Edit Task</button>
        </div>
    </form>
@endsection
