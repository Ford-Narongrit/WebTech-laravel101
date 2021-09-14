@extends('layouts.main')

@section('content')
    <div class="text-center text-5xl py-3">TASKS LIST</div>
    <div class="text-center block my-4">
        <a href="{{ route('tasks.create') }}" class="bg-green-400 rounded-xl p-2 hover:bg-green-300">Add New Task</a>
    </div>

    <table class="shadow-lg mx-auto">
        <thead>
            <tr class="text-md font-semibold text-left text-gray-900 bg-gray-300 uppercase border-b border">
                <th class="px-4 py-3">No.</th>
                <th class="px-4 py-3">task title</th>
                <th class="px-4 py-3">tags</th>
                <th class="px-4 py-3">task detail</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td class="px-4 py-3 border">
                        {{ $loop->index + 1 }}
                    </td>
                    <td class="px-4 py-3 border">
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                            @if ($task->is_urgent)
                                <span class="bg-red-400 py-1 px-4 rounded-xl">ด่วน</span>
                            @endif
                            <span class="hover:underline">
                                {{ $task->title }}
                            </span>
                        </a>
                    </td>
                    <td class="px-4 py-3 border space-x-1">
                        @foreach ($task->tags as $tag)
                            <span class="bg-gray-300 p-2 rounded-xl">
                                <a href="{{ route('tags.slug', ['slug' => $tag->name]) }}" class="hover:underline">
                                    {{ $tag->name }}
                                </a>
                            </span>
                        @endforeach
                    </td>
                    <td class="px-4 py-3 border">
                        {{ $task->detail }}
                    </td>
                    <td class="px-4 py-3 border text-center">
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                            class="bg-gray-400 rounded-xl p-2 hover:bg-gray-300 uppercase">EDIT TASK</a>
                        <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                            class="bg-red-400 rounded-xl p-2 hover:bg-red-300 uppercase">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
