@extends('layouts.main')

@section('content')
    <div class="space-y-5">
        <h1 class="text-center text-5xl py-3">{{ $task->title }}</h1>
        <div class="text-center text-xl space-x-2">
            @foreach ($task->tags as $tag)
                <span class="bg-gray-300 p-2 rounded-xl">
                    <a href="{{ route('tags.slug', ['slug' => $tag->name]) }}" class="hover:underline">
                        {{ $tag->name }}
                    </a>
                </span>
            @endforeach
        </div>
        <div class="text-center text-xl @if ($task->is_urgent) text-red-500 @endif">
            Due date: {{ $task->due_date->format('j/m/Y') }}
        </div>
        <div class="text-left text-xl bg-gray-200 h-96 p-6 rounded-xl">
            {{ $task->detail }}
        </div>
        <div class="text-center block my-4">
            <a href="{{ route('tasks.index') }}" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">ALL TASK</a>
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                class="bg-green-400 rounded-xl p-2 hover:bg-green-300">EDIT TASK</a>
        </div>
        <div class="bg-red-100 border-4 border-red-200 rounded-xl p-4">
            <span class="text-2xl font-bold text-red-700">
                Danger Zone
            </span>
            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="p-4 space-y-4">
                @method('DELETE')
                @csrf
                <label for="destroy" class="text-xl block">Delete this task</label>
                <div>Please type
                    <span class="text-red-900 font-bold text-xl">
                        "{{ $task->title }}"
                    </span>
                    to confirm.
                </div>
                <input type="text" placeholder="enter title" name="title" class="w-4/5 px-2 py-3 rounded-xl border" autocomplete="off">
                <button type="submit" class="bg-red-400 rounded-xl p-3 hover:bg-red-300">delete</button>
            </form>
        </div>
    </div>
@endsection
